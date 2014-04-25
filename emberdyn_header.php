<?php

    /**
     *  Emberdyn Bootstrap File
     */

    //Essential Constants - NO NOT ALTER THIS SECTION
    //------------------------------------------------------------------------------------------------------------||
    if ( !defined('BASE_PATH') ) define('BASE_PATH', dirname(__FILE__) . '/');
    if ( !defined('CORE_PATH') ) define('CORE_PATH', BASE_PATH . 'core/');
    //------------------------------------------------------------------------------------------------------------||

    //Includes
    //------------------------------------------------------------------------------------------------------------||
    require(CORE_PATH . 'helpers.php');
    require(BASE_PATH . 'config.php');

    if ( !defined('THEMES_PATH') ) define('THEMES_PATH', BASE_PATH . THEMES_FOLDER . '/');
    if ( !defined('PLUGINS_PATH') ) define('PLUGINS_PATH', BASE_PATH . PLUGINS_FOLDER . '/');

    require(CORE_PATH . 'models/models.php');
    require(CORE_PATH . 'controllers/theme_engine.php');
    //------------------------------------------------------------------------------------------------------------||

    //Handle Debugging
    //------------------------------------------------------------------------------------------------------------||
    if(DEBUG_MODE == 'true'){
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    } else if (DEBUG_MODE == 'false'){
        error_reporting(0);
    } else {
        echo DEBUG_ERROR;
    }
    //------------------------------------------------------------------------------------------------------------||















