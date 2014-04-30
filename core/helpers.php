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

    /**
     * @param $path
     * @return array
     * Converts the contents of an XML file to an array
     */
    function xmlToArray($path){

        $xml   = simplexml_load_file($path);
        $array = xmlElementToArray($xml);
        $array = array($xml->getName() => $array);

        return $array;
    }

    /**
     * @param SimpleXMLElement $parent
     * @return array
     * Converts a SimpleXMLElemnt to an array
     */

    function xmlElementToArray(SimpleXMLElement $parent){

        $array = array();

        foreach ($parent as $name => $element) {
            ($node = & $array[$name])
            && (1 === count($node) ? $node = array($node) : 1)
            && $node = & $node[];

            $node = $element->count() ? xmlElementToArray($element) : trim($element);
        }

        return $array;
    }

    /**
     * @param $xpath
     * @return mixed
     */

    function getNode($xpath){
        $xpathArray = explode('/', $xpath);
        $config = xmlToArray(BASE_PATH . 'config.xml');
        return $config['config'][$xpathArray[0]][$xpathArray[1]];
    }

    /**
     * @return mixed
     * Retrieves the site title
     */
    function getSiteTitle(){
        return SITE_TITLE;
    }

    /**
     * @return mixed
     * Retrieves the folder name of the current theme
     */
    function getCurrentTheme(){
        return CURRENT_THEME;
    }


    function getParameter($type, $param){

        switch($type){

            case 'post':
                if (isset ($_POST[$param])){
                    return $_POST[$param];
                } else {
                    return "The parameter <strong>{$param}</strong> has not been set.";
                }
                break;
            case 'get':
                if (isset ($_GET[$param])){
                    return $_GET[$param];
                } else {
                    return "The parameter <strong>{$param}</strong> has not been set.";
                }
                break;
            case 'session':
                if (isset ($_SESSION[$param])){
                    return $_SESSION[$param];
                } else {
                    return "The parameter <strong>{$param}</strong> has not been set.";
                }
                break;

            default:
                return "<strong>{$type}</strong> is not a valid parameter type";
                break;
        }
    }

    function setParameter($type, $param, $value){

        switch($type){

            case 'post':
                $_POST[$param] = $value;
                break;
            case 'get':
                $_GET[$param] = $value;
                break;
            case 'session':
                $_SESSION[$param] = $value;
                break;
            default:
                return "<strong>{$type}</strong> is not a valid parameter type";
                break;
        }
    }

    function startSession(){
        session_start();
    }








