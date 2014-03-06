<?php

    /**
    *   PHP Configuration for Emberdyn.
    */

    //Essential Constants - NO NOT ALTER THIS SECTION
    //------------------------------------------------------------------------------------------------------------||
    // absoulte path to the Emberdyn root directory
    if ( !defined('BASE_PATH') ) define('BASE_PATH', dirname(__FILE__) . '/');
    if ( !defined('INCLUDES_PATH') ) define('INCLUDES_PATH', BASE_PATH . 'includes/');
    //------------------------------------------------------------------------------------------------------------||

    //Global Constants
    //------------------------------------------------------------------------------------------------------------||
    define('SITE_TITLE',        'Emberdyn');    //Site Title
    define('ADMIN_TEMPLATE',    'admin');       //Admin Template
    define('SITE_TEMPLATE',     'site');        //Site Template
    define('ADMIN_FOLDER',      'admin');       //Admin Folder
    //------------------------------------------------------------------------------------------------------------||

    //Database Constants - This information can be obtained from your server.
    //------------------------------------------------------------------------------------------------------------||
    define('DB_DRIVER',         'mysql');       //Database Driver
    define('DB_HOST',           'localhost');   //Database Server/Hostname
    define('DB_NAME',           'emberdyn');    //Database Name
    define('DB_USER',           'emberdyn');    //Database Username
    define('DB_PASSWORD',       'emberdyn');    //Database Password
    define('DB_TABLE_PREFIX',   'em_');         //Database Table Prefix
    //------------------------------------------------------------------------------------------------------------||

