<?php


    if(file_exists('../config.xml')){
        echo "config.xml has been detected.  If you would like to reinstall, please delete config.xml" ;
    } else {
        //include_once('../config.php');
        include_once('install.phtml');
    }

