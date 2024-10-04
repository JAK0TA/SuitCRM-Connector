<?php

$EM_CONF[$_EXTKEY] = [
  'title' => 'SuiteCRM Connector',
  'description' => 'A Connector for a SuiteCRM Installation. It uses the Rest API.',
  'category' => 'services',
  'state' => 'stable',
  'internal' => '',
  'uploadfolder' => '0',
  'createDirs' => '',
  'clearCacheOnLoad' => 0,
  'version' => '2.0.0',
  'constraints' => [
    'depends' => [
      'typo3' => '^11.5',
    ],
    'conflicts' => [],
    'suggests' => [],
  ],
];
