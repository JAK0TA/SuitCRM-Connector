<?php

namespace JAKOTA\SuitecrmConnector\Utility;

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Log\Logger;
use TYPO3\CMS\Core\Log\LogManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/*
 *  Copyright notice
 *
 *  (c) 2017 Martin Fünning <fuenning@jakota.de>, JAKOTA Design Group GmbH
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 */

class SuiteCrmApiUtility {
  protected string $apiApplication;

  protected string $apiPassword;

  protected string $apiURL;

  protected mixed $apiUser = false;

  protected string $apiUsername;

  protected ExtensionConfiguration $configurationUtility;

  protected Logger $log;

  protected string $loginStatus;


  protected int $timeout = 15;

  /**
   * Constructor.
   */
  public function __construct() {
    $this->configurationUtility = GeneralUtility::makeInstance(ExtensionConfiguration::class);

    // Load the CRM connection settings from the ext_conf
    $crmApiSettings = $this->configurationUtility->get('suitecrm_connector');
    $this->loadSettings($crmApiSettings);

    // INIT the TYPO§ Logger Logs can be found in /typo3temp/logs/typo3.log
    $this->log = GeneralUtility::makeInstance(LogManager::class)->getLogger(__CLASS__);
    // Initiate the Login
    $this->doLogin();
  }

  /**
   * Sends a post request to the crm api.
   */
  public function call(string $method, mixed $parameters): mixed {
    // Try to fill the session id
    if ($this->apiUser && !array_key_exists('session', $parameters) && 'login' != $method) {
      $parameters = array_merge_recursive(['session' => $this->apiUser->id], $parameters);
    }

    try {
      $curl_request = curl_init();
      curl_setopt($curl_request, CURLOPT_URL, $this->getApiUrl());
      curl_setopt($curl_request, CURLOPT_POST, 1);
      curl_setopt($curl_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
      curl_setopt($curl_request, CURLOPT_HEADER, 1);
      curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($curl_request, CURLOPT_FOLLOWLOCATION, 0);
      $jsonEncodedData = json_encode($parameters);
      $post = [
        'method' => $method,
        'input_type' => 'JSON',
        'response_type' => 'JSON',
        'rest_data' => $jsonEncodedData,
      ];
      curl_setopt($curl_request, CURLOPT_POSTFIELDS, $post);
      $result = curl_exec($curl_request);
      curl_close($curl_request);
      $result = explode("\r\n\r\n", $result, 2);

      return json_decode($result[1]);
    } catch (\Exception $e) {
      $this->log->error($e->getMessage());

      return false;
    }
  }

  /**
   * Formats a PHP associative array to a crm api compatible name-value list.
   *
   * @param mixed $source
   */
  public function formatNameValueList($source): array {
    $nameValueList = [];
    foreach ($source as $name => $value) {
      $nameValueList[] = [
        'name' => $name,
        'value' => $value,
      ];
    }

    return $nameValueList;
  }

  /**
   * Returns the api url.
   */
  public function getApiUrl(): ?string {
    return $this->apiURL;
  }

  /**
   * Returns the login request answer as array, if the login failed this will be false.
   */
  public function getApiUser(): array|bool|\stdClass {
    return $this->apiUser;
  }

  /**
   * Returns the login status, if everything is fine this will be 'OK' otherwise this contains a error.
   */
  public function getLoginStatus(): string {
    return $this->loginStatus;
  }

  /**
   * Returns the settings as array.
   */
  public function getSettings(): array {
    return [
      'url' => $this->apiURL,
      'user' => $this->apiUsername,
      'password' => $this->apiPassword,
      'application' => $this->apiApplication,
    ];
  }

  /**
   * Writes the settings in ext_conf and try a login with the new settings.
   *
   * @param mixed $crmApiSettings
   */
  public function setSettings($crmApiSettings): void {
    $this->configurationUtility->set('suitecrm_connector', $crmApiSettings);
    $this->loadSettings($crmApiSettings);
    $this->doLogin();
  }

  /**
   * Sends a Login request to the api url.
   */
  protected function doLogin(): void {
    // Try to login
    $response = $this->call('login', [
      'user_auth' => [
        'user_name' => $this->apiUsername,
        'password' => md5($this->apiPassword),
        'application' => $this->apiApplication,
      ],
    ]);
    if ($response) {
      if (isset($response->id)) {
        $this->apiUser = $response;
        $this->loginStatus = 'OK';
      } elseif (isset($response->name)) {
        $this->apiUser = false;
        $this->loginStatus = 'Login attempt failed: '.$response->name.' - '.$response->description;
      } else {
        $this->apiUser = false;
        $this->loginStatus = 'Login attempt failed: unknown reason';
      }
    } else {
      $this->apiUser = false;
      $this->loginStatus = 'Login attempt failed: no server response';
    }

    if (!$this->apiUser) {
      $this->log->error($this->loginStatus);
    }
  }

  /**
   * Loads the settings from an array.
   *
   * @param array<string, mixed> $crmApiSettings
   */
  protected function loadSettings(array $crmApiSettings): void {
    $this->apiURL = $crmApiSettings['url'];
    $this->apiUsername = $crmApiSettings['user'];
    $this->apiPassword = $crmApiSettings['password'];
    $this->apiApplication = $crmApiSettings['application'];
  }
}
