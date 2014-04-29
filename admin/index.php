<?php

    include('../core/models/users.php');


    //Essential Constants - NO NOT ALTER THIS SECTION
    //------------------------------------------------------------------------------------------------------------||
    if ( !defined('BASE_PATH') ) define('BASE_PATH', dirname(__FILE__) . '/../');
    if ( !defined('CORE_PATH') ) define('CORE_PATH', BASE_PATH . 'core/../');
    //------------------------------------------------------------------------------------------------------------||

    echo BASE_PATH;

    require(BASE_PATH . '/ba_header.php');

    if(DEBUG_MODE == 'true'){
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    } else if (DEBUG_MODE == 'false'){
        error_reporting(0);
    } else {
        echo DEBUG_ERROR;
    }

    $test = new User();
    $vals = array('id'=>'', 'first_name'=>'Test', 'last_name'=>'Johnson', 'email'=>'test@test.com', 'username'=>'tjohnson', 'password'=>'12345', 'image_url'=>'test');
    $test->setValues($vals);

    var_dump($test);
    //$test->save();

?>
