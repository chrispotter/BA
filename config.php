<?php

    /**
    *   PHP Configuration for Emberdyn.
    *   DO NOT MAKE CHANGES TO THIS FILE!!!!!
    */

    $config = xmlToArray('config.xml');

    //Global Constants
    //------------------------------------------------------------------------------------------------------------||
    define('SITE_TITLE',    $config['config']['global']['site_title']);   //Site Title
    define('ADMIN_FOLDER',  $config['config']['global']['admin_folder']); //Admin Folder
    define('DEBUG_MODE',    $config['config']['global']['debug_mode']);   //Debug Mode
    //------------------------------------------------------------------------------------------------------------||

    //Database Constants - This information can be obtained from your server.
    //------------------------------------------------------------------------------------------------------------||
    define('DB_DRIVER',     $config['config']['database']['db_driver']);  //Database Driver
    define('DB_HOST',       $config['config']['database']['db_host']);    //Database Server/Hostname
    define('DB_NAME',       $config['config']['database']['db_name']);    //Database Name
    define('DB_USER',       $config['config']['database']['db_user']);    //Database Username
    define('DB_PASS',       $config['config']['database']['db_pass']);    //Database Password
    define('DB_TBL_PREFIX', $config['config']['database']['db_prefix']);  //Database Table Prefix
    //------------------------------------------------------------------------------------------------------------||

    //Error Messages
    //------------------------------------------------------------------------------------------------------------||
    define('DEBUG_ERROR', "ERROR: < debug_mode > must be set to either 'true' or 'false'.
        Please check the GLOBAL settings of your config.xml to fix this error.");
    //------------------------------------------------------------------------------------------------------------||


