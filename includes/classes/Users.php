<?php
    class Users
    {
        private $con;
        private $username;
        public function __construct($con,$username)
        {
            $this->con = $con;
            $this->username = $username;
        }

        public function userLoggedIn()
        {
            return $this->username;
        }
    }
?>