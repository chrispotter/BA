<?php

    include_once('../models/users.php');
    include_once('../helpers.php');



    $login = new Login();

    class Login{

        private $user;

        public function __construct(){

            startSession();

            $username = getParameter('post', 'username');
            $password = getParameter('post', 'password');

            $this->user = new User($username);

            if ($this->user->getUsername() == "" || $this->user == null){
                echo "<strong>User Not Found</strong> in our Database, would you like to ";
                echo "<a href='" . BASE_URL . 'themes/default_theme/register.phtml' . "'>Register</a>?";
                return;
            }

            if($this->user->getPassword() == md5($password)){
                setParameter('session', 'is_logged_in', true);
                setParameter('session', 'current_user', $this->user->getId());
                echo "Logged in as user " . getParameter('session', 'current_user');
                header('Location: ' . getParameter('server', 'HTTP_ORIGIN')  . '/BlueAcorn');
            }

        }





    }


