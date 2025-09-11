<?php

// Copyright JAKOTA Design Group GmbH. All rights reserved.
declare(strict_types=1);

use JAKOTA\SuitecrmConnector\Controller\SuiteCrmConnectorController;

return [
  'web_module' => [
    'parent' => 'tools',
    'position' => ['after' => '*'],
    'access' => 'admin',
    'workspaces' => 'live',
    'icon' => 'EXT:suitecrm_connector/Resources/Public/Icons/user_mod_suitecrmsettings.svg',
    'path' => '/suitecrm/backend',
    'labels' => 'LLL:EXT:suitecrm_connector/Resources/Private/Language/locallang_suitecrmsettings.xlf',
    'extensionName' => 'suitecrm_connector',
    'controllerActions' => [
      SuiteCrmConnectorController::class => [
        'settings',
      ],
    ],
  ],
];
