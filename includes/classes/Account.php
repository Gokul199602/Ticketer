<?php
    class Account
    {
        private $con;
        private $errorArray = array();
        public function __construct($con)
        {
            $this->con = $con;
        }

        public function register($un,$em,$pw,$pw1)
        {
            $this->validateUsername($un);
            $this->validateEmail($em);
            $this->validatePassword($pw,$pw1);

            if(empty($this->errorArray))
            {
                return $this->insertValues($un,$em,$pw);
            }

            else
            {
                return false;
            }
        }

        public function insertValues($un,$em,$pw)
        {
            $pw = hash("sha512",$pw);
            $query = $this->con->prepare("INSERT INTO register(username,email,password) 
            VALUES (:un,:em,:pw)");
            $query->bindParam(":un",$un);
            $query->bindParam(":em",$em);
            $query->bindParam(":pw",$pw);
            return $query->execute();
        }

        public function validateUsername($un)
        {
            if((strlen($un)>25) || (strlen($un)<2))
            {
                array_push($this->errorArray,Validate::$usernameless);
                return;
            }
            $query = $this->con->prepare("SELECT * FROM register WHERE username = :un");
            $query->bindParam(":un",$un);
            $query->execute();

            if($query->rowCount()!=0)
            {
                array_push($this->errorArray,Validate::$usernameTaken);
                return;
            }
        }
        public function validateEmail($em)
        {
            if(!filter_var($em,FILTER_VALIDATE_EMAIL))
            {
                array_push($this->errorArray,Validate::$emailInvalid);
                return;
            }
        }
        public function validatePassword($pw,$pw1)
        {
            if((strlen($pw)>25) || (strlen($pw)<5))
            {
                array_push($this->errorArray,Validate::$passwordLess);
                return;
            }
            if($pw!=$pw1)
            {
                array_push($this->errorArray,Validate::$passwordMismatch);
                return;
            }

        }

        public function login($un,$pw)
        {
            $pw = hash("sha512", $pw);
            $query=$this->con->prepare("SELECT * FROM register WHERE
            username=:un and password=:pw");
            $query->bindParam(":un",$un);
            $query->bindParam(":pw",$pw);
            $query->execute();
            if($query->rowCount() == 1)
            {
                return true;
            }
            else
            {
                array_push($this->errorArray, Validate::$logginFailed);
			    return false;
            }
        }

        public function getError($err)
        {
            if(in_array($err,$this->errorArray))
            {
                return "<span class='errorMessage'>$err</span>";
            }
        }
    }
?>