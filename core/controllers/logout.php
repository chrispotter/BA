<?php

    include_once('../helpers.php');
    startSession();
    setParameter('session', 'is_logged_in', false);
    setParameter('session', 'current_user', 0);
    header('Location: ' . getParameter('server', 'HTTP_ORIGIN')  . '/BlueAcorn');




