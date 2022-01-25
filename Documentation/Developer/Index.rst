.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _developer:

Developer
=========

You get a simple API to talk to your SuiteCRM. Use the Class :code:`\JAKOTA\SuitecrmConnector\Utility\SuiteCrmApiUtility`


.. _developer-methods:

Methods
-------

Possible hook examples. Input parameters are:

+-----------------------------+---------------------------------------------------------------------------------------------------+
| Name                        | Description                                                                                       |
+=============================+===================================================================================================+
| getLoginStatus()            | Returns the login status If everything is fine this will be 'OK' otherwise this contains a error. |
+-----------------------------+---------------------------------------------------------------------------------------------------+
| getSettings()               | Returns the settings as associative array                                                         |
+-----------------------------+---------------------------------------------------------------------------------------------------+
| getApiUser()                | Returns the login request answer as stdObject, if the login failed this will be false.            |
+-----------------------------+---------------------------------------------------------------------------------------------------+
| call($method, $parameters)  | Sends a post request to the crm api                                                               |
+-----------------------------+---------------------------------------------------------------------------------------------------+
| formatNameValueList($array) | Formats a PHP associative array to a crm api compatible name-value list.                          |
+-----------------------------+---------------------------------------------------------------------------------------------------+

.. _developer-api:

Examples
--------

**getLoginStatus()**

.. code-block:: php

	$loginStaus = $this->suiteCrmApiUtility->getLoginStatus();
	if ($loginStatus == 'OK') {
		// Okay we can do a call()
	} else {
		// There is no session id, better check the error.
		\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($loginStatus);
	}

**getSettings()**

.. code-block:: php

	// use the Settings in a Fluid template
	$apiSettings = $this->suiteCrmApiUtility->getSettings();
	$this->view->assign('crmUsername', $apiSettings['user']);
    $this->view->assign('crmPassword', $apiSettings['password']);
    $this->view->assign('crmURL', $apiSettings['url']);
    $this->view->assign('crmApplication', $apiSettings['application']);

**getApiUser()**

.. code-block:: php

	// use the Settings in a Fluid template
	$apiUser = $this->suiteCrmApiUtility->getApiUser();
	if ($apiUser) {
		// There is a user, so the login works, lets check the session id
		\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($apiUser->id);
	}

**call($method, $parameters) and formatNameValueList($array)**

.. code-block:: php

	/**
	 * Example Controller
	 */
	class SomethingWithSuiteCrmConnectionController extends ActionController {

	    /**
	     * suiteCrmApiUtility
	     * use the inject feature to have the connector in your controller.
	     *
	     * @var \JAKOTA\SuitecrmConnector\Utility\SuiteCrmApiUtility
	     * @inject
	     */
	    protected $suiteCrmApiUtility = NULL;

	    /**
	     * retrieveRecordsAction
	     */
	    public function retrieveRecordsAction() {

			// Build the request data array note, that there is no session id.
			// call() puts the session id by its own. formatNameValueList() is
			// used to bring an array to the form that link_name_to_fields_array
			// requires
	        $get_entry_list_parameters = array(
	            'module_name' => "Contacts",
	            'query' => "",
	            'order_by' => "",
	            'offset' => "0",
	            'select_fields' => array(
	                'id',
	                'first_name',
	                'last_name',
	            ),
	            'link_name_to_fields_array' => array(
	                $this->suiteCrmApiUtility->formatNameValueList(array(
	                    'email_addresses' => array(
	                        'id',
	                        'email_address',
	                        'opt_out',
	                        'primary_address'
	                    )
	                ))
	            ),
	            'max_results' => '2',
	            'deleted' => 0,
	            'Favorites' => false,
	        );

	        $response = $this->suiteCrmApiUtility->call('get_entry_list', $get_entry_list_parameters);
	    }
	}