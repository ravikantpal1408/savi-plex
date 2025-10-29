<?php

class Account
{
    private $con;
    private $errorsArray = array();

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function register($fn, $ln, $un, $em, $em2, $pw, $pw2)
    {
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateUsername($un);
    }

    private function validateFirstName($fn)
    {
        if (strlen($fn) < 2 || strlen($fn) > 25) {
            array_push($this->errorsArray, Constants::$firstNameCharacters);
        }
    }

    private function validateLastName($ln)
    {
        if (strlen($ln) < 2 || strlen($ln) > 25) {
            array_push($this->errorsArray, Constants::$lastNameCharacters);
        }
    }

    private function validateUsername($un)
    {
        if (strlen($un) < 2 || strlen($un) > 25) {
            array_push($this->errorsArray, Constants::$usernameCharacters);
        }
        $query = $this->con->prepare("SELECT username from users where username=:un");
        $query->bindValue(":un", $un);
        $query->execute();

        if ($query->rowCount() != 0) {
            array_push($this->errorsArray, Constants::$usernameTaken);
        }
    }

    public function getErrors($error)
    {
        if (in_array($error, $this->errorsArray)) {
            return $error;
        }
    }
}

?>