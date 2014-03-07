<?php

    /**
     *  Emberdyn Users Model Object
     */

    class Users {

        private $id;
        private $first_name;
        private $last_name;
        private $email;
        private $username;
        private $password;
        private $db;

        function __construct($id){

            $this->db = new Database();

            if(isset($id)){
                $user = $this->db->select(DB_TBL_PREFIX . 'users', 'id', $id);
                $this->id = $user[0]['id'];
                $this->first_name = $user[0]['first_name'];
                $this->last_name = $user[0]['last_name'];
                $this->email = $user[0]['email'];
                $this->username = $user[0]['username'];
                $this->password = $user[0]['password'];
            } else {

            }

        }

        function getId(){
            return $this->id;
        }

        function setId($id){
            $this->id = $id;
        }

        function getFirstName(){
            return $this->first_name;
        }

        function setFirstName($fname){
            $this->first_name = $fname;
        }

        function getLastName(){
            return $this->last_name;
        }

        function setLastName($lname){
            $this->last_name = $lname;
        }

        function getEmail(){
            return $this->email;
        }

        function setEmail($email){
            $this->email = $email;
        }

        function getUsername(){
            return $this->username;
        }

        function setUsername($username){
            $this->username = $username;
        }

        function getPassword(){
            return $this->password;
        }

        function setPassword($password){
            $this->password = $password;
        }

        function save(){
            //WORK ON ME!!!


        }





    }