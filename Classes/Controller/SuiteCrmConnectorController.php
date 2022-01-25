<?php

namespace JAKOTA\SuitecrmConnector\Controller;

use JAKOTA\SuitecrmConnector\Utility\SuiteCrmApiUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

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

class SuiteCrmConnectorController extends ActionController {
  protected $suiteCrmApiUtility;

  public function __construct(SuiteCrmApiUtility $suiteCrmApiUtility) {
    $this->suiteCrmApiUtility = $suiteCrmApiUtility;
  }

  /**
   * Settings Action - For SuiteCRM settings in the backend.
   */
  public function settingsAction() {
    if ($this->request->hasArgument('crmApiSettings')) {
      $crmApiSettings = $this->request->getArgument('crmApiSettings');
      $this->view->assign('crmApiSettings', $crmApiSettings);
      $this->suiteCrmApiUtility->setSettings($crmApiSettings);
    } else {
      $this->view->assign('crmApiSettings', $this->suiteCrmApiUtility->getSettings());
    }
    $this->view->assign('crmApiUser', $this->suiteCrmApiUtility->getApiUser());
    $this->view->assign('crmApiLoginStatus', $this->suiteCrmApiUtility->getLoginStatus());
  }
}
