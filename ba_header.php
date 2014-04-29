<?php

    /**
     *  Emberdyn Bootstrap File
     */

    //Includes
    //------------------------------------------------------------------------------------------------------------||
    require(CORE_PATH . 'helpers.php');
    require(BASE_PATH . 'config.php');

    if ( !defined('THEMES_PATH') ) define('THEMES_PATH', BASE_PATH . THEMES_FOLDER . '/');

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















