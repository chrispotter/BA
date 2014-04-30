<?php

    include_once('../helpers.php');
    startSession();
    setParameter('session', 'is_admin_logged_in', 'false');
    header("Location: ../../admin");
    die();



