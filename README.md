# TYPO3 SuiteCRM Connector

## Overview

This TYPO3 package is a simple API connector for integrating SuitCRM into TYPO3. The connector uses SuitCRM's REST API to pull data like contacts, leads, and opportunities into TYPO3. It is designed for TYPO3 version 11.5 and PHP 8.0 or higher.

## Requirements

- **PHP**: ^8.0
- **TYPO3 CMS Core**: ^11.5
- **SuitCRM**: A functioning and accessible REST API instance of SuitCRM.

## Installation

### 1. Installation via Composer

Run the following command to install the package using Composer:

```bash
composer require jakota/suitecrm-connector
```

### 2. Activating in the TYPO3 Backend
After installation, the extension must be activated in the TYPO3 backend:

Go to Extensions in the TYPO3 backend.
Search for the extension `suitecrm_connector` and activate it.

### 3. Configuring the API Connection
The configuration is done through the backend module "SuiteCRM Settings", where you can enter the necessary API credentials to connect to your SuitCRM instance.

Configuration Steps:
- Navigate to Web > SuiteCRM Settings.
- Fill in the following fields:
  - API URL: The URL of your SuitCRM instance (e.g., https://your-suitcrm-domain/api).
  - Username: The API username.
  - Password: The password for the API.
  - Application Name: The unique name of the application for the SuitCRM API.
- Save the settings to activate the connection.

## Authors
- Martin Fünning (fünning@jakota.de)
- Michael Krohn (krohn@jakota.de)

## License
This package is licensed under GPL-2.0-or-later.


## Support
If you encounter issues or have any questions, feel free to contact the developers or open an issue in the GitHub repository.