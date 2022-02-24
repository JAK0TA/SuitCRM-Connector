<?php

use JAKOTA\SuitecrmConnector\Controller\SuiteCrmConnectorController;

defined('TYPO3_MODE') || exit('Access denied.');

(function () {
  \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
    'suitecrm_connector',
    'tools',
    'connectorsettings',
    'top',
    [
      SuiteCrmConnectorController::class => 'settings',
    ],
    [
      'access' => 'admin',
      'icon' => 'EXT:suitecrm_connector/Resources/Public/Icons/user_mod_suitecrmsettings.svg',
      'labels' => 'LLL:EXT:suitecrm_connector/Resources/Private/Language/locallang_suitecrmsettings.xlf',
    ]
  );
})();
