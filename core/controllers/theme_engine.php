<?php

    /**
     * Emberdyn Theme Engine
     */

    //Display the current theme
    //------------------------------------------------------------------------------------------------------------||
    require_once(THEMES_PATH . getCurrentTheme() . '/header.phtml');
    require_once(THEMES_PATH . getCurrentTheme() . '/sidebar.phtml');
    require_once(THEMES_PATH . getCurrentTheme() . '/main.phtml');
    require_once(THEMES_PATH . getCurrentTheme() . '/footer.phtml');
    //------------------------------------------------------------------------------------------------------------||