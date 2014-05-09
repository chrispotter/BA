<?php

include_once('../models/users.php');
include_once('../helpers.php');
include_once('login.php');

$login = new Register();

class Register{

    private $user;

    public function __construct(){

        startSession();

        $firstname = getParameter('post', 'first-name');
        $lastname = getParameter('post', 'last-name');
        $email = getParameter('post', 'register-email');
        $username = getParameter('post', 'register-username');
        $password = getParameter('post', 'register-password');

        $this->user = new User();

        $this->user->setFirstName($firstname);
        $this->user->setLastName($lastname);
        $this->user->setEmail($email);
        $this->user->setUsername($username);
        $this->user->setPassword(md5($password));

        $this->user->save();

        echo "Thanks for Registering!";

        header('Location: ' . getParameter('server', 'HTTP_ORIGIN')  . '/BlueAcorn');

    }





}


