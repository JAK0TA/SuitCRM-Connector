<?php

$EM_CONF[$_EXTKEY] = [
  'title' => 'SuiteCRM Connector',
  'description' => 'A Connector for a SuiteCRM Installation. It uses the Rest API.',
  'category' => 'services',
  'state' => 'stable',
  'clearCacheOnLoad' => 0,
  'author' => 'Michael Krohn',
  'author_email' => 'suitecrm-typo3@jakota.de',
  'author_company' => 'JAKOTA Design Group GmbH',
  'version' => '2.0.0',
  'constraints' => [
    'depends' => [
      'typo3' => '11.5.0-11.99.99',
    ],
    'conflicts' => [],
    'suggests' => [],
  ],
];
