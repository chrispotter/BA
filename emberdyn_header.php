<?php

    /**
     *  Emberdyn Bootstrap File
     */

    require('config.php');
    require(INCLUDES_PATH . '/models/db.php');
    require(INCLUDES_PATH . 'helpers.php');

    //Print Config XML
    var_dump(xmlToArray('config.xml'));








