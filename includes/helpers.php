<?php

    /**
     *  @return bool
     *  Determine if user is within admin context (i.e. the admin area)
     */
    function isAdminContext(){
        $url = 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        if (strpos($url, ADMIN_FOLDER) !== false){
            return true;
        } else {
            return false;
        }
    }