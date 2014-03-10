<?php

    /**
     *  Emberdyn Bootstrap File
     */

    //Essential Constants - NO NOT ALTER THIS SECTION
    //------------------------------------------------------------------------------------------------------------||
    if ( !defined('BASE_PATH') ) define('BASE_PATH', dirname(__FILE__) . '/');
    if ( !defined('INCLUDES_PATH') ) define('INCLUDES_PATH', BASE_PATH . 'includes/');
    if ( !defined('ADDONS_PATH') ) define('ADDONS_PATH', BASE_PATH . 'addons/');
    //------------------------------------------------------------------------------------------------------------||

    //Includes
    //------------------------------------------------------------------------------------------------------------||
    require(INCLUDES_PATH . 'helpers.php');
    require(BASE_PATH . 'config.php');
    require(INCLUDES_PATH . 'models/models.php');
    require(INCLUDES_PATH . 'controllers/theme_engine.php');
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















