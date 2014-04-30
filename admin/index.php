<?php

    const DS = DIRECTORY_SEPARATOR;

    //Includes
    //------------------------------------------------------------------------------------------------------------||
    require_once('../config.php');
    require_once('../core/models/models.php');

    if ( !defined('THEMES_PATH') ) define('THEMES_PATH', BASE_PATH . THEMES_FOLDER . '/');

    require_once(CORE_PATH . 'models/models.php');
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

    startSession();

    getParameter('session', 'is_admin_logged_in');

    if(getParameter('session', 'is_admin_logged_in') != 'true'){
        include_once(CORE_PATH .'views/admin_login_view.phtml');

    } else {
        include_once(CORE_PATH .'views/admin_logout_view.phtml');
        include_once(CORE_PATH . 'views/admin_main_view.phtml');
        /* SHOW ADMIN PANEL */



    }




