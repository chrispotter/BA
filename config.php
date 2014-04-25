<?php

    /**
    *   PHP Configuration for Emberdyn.
    *   DO NOT MAKE CHANGES TO THIS FILE!!!!!
    */

    //Global Constants
    //------------------------------------------------------------------------------------------------------------||
    define('SITE_TITLE',    getNode('global/site_title'));      //Site Title
    define('ADMIN_FOLDER',  getNode('global/admin_folder'));    //Admin Folder
    define('DEBUG_MODE',    getNode('global/debug_mode'));      //Debug Mode
    define('CURRENT_THEME', getNode('global/current_theme'));   //Current Theme
    //------------------------------------------------------------------------------------------------------------||

    //Database Constants - This information can be obtained from your server.
    //------------------------------------------------------------------------------------------------------------||
    define('DB_DRIVER',     getNode('database/db_driver'));     //Database Driver
    define('DB_HOST',       getNode('database/db_host'));       //Database Server/Hostname
    define('DB_NAME',       getNode('database/db_name'));       //Database Name
    define('DB_USER',       getNode('database/db_user'));       //Database Username
    define('DB_PASS',       getNode('database/db_pass'));       //Database Password
    define('DB_TBL_PREFIX', getNode('database/db_prefix'));     //Database Table Prefix
    //------------------------------------------------------------------------------------------------------------||

    //Error Messages
    //------------------------------------------------------------------------------------------------------------||
    define('DEBUG_ERROR', "ERROR: < debug_mode > must be set to either 'true' or 'false'.
        Please check the GLOBAL settings of your config.xml to fix this error.");
    //------------------------------------------------------------------------------------------------------------||


