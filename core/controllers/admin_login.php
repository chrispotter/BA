<?php

    include_once('../models/users.php');
    include_once('../helpers.php');

    $login = new AdminLogin();

    class AdminLogin{

        private $user;

        public function __construct(){

            startSession();

            $username = getParameter('post', 'ba_username');
            $this->user = new User($username);

            if($this->isValidAdminUser()){
                setParameter('session', 'is_admin_logged_in', 'true');
                setParameter('session', 'current_user', $this->user->getId());
            } else {
                setParameter('session', 'is_admin_logged_in', 'false');
                setParameter('session', 'current_user', 0);
            }

            $this->redirectToAdmin();
        }

        private function isValidAdminUser(){

            if ($this->user->getPassword() == md5(getParameter('post', 'ba_password')) && $this->user->getUserType() == 'admin'){
                return true;
            } else {
                return false;
            }
        }

        private function redirectToAdmin(){
            header("Location: ../../admin");
            die();
        }

    }


