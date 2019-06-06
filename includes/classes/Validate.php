<?php
    class Validate
    {
        public Static $usernameless ="Username should be greater than 2 and less than 25";
        public Static $usernameTaken ="The username is already Taken";
        public static $emailInvalid = "The email is invalid";
        public static $passwordMismatch = "Password does not match";
        public static $passwordLess = "Password should not be greater than 25 or less than 5";
        public static $logginFailed = "Username or password is incorrect";
    }
?>