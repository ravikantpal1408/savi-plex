<?php

class Account
{
    private $con;
    private $errorsArray = array();

    public function _construct(con)
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
            array_push($errorsArray, Constants::$firstNameCharacters);
        }
    }

    private function validateLastName($fn)
    {
        if (strlen($fn) < 2 || strlen($fn) > 25) {
            array_push($errorsArray, Constants::$lastNameCharacters);
        }
    }

    private function validateUsername($fn): void
    {
        if (strlen($fn) < 2 || strlen($fn) > 25) {
            array_push($errorsArray, Constants::$usernameCharacters);
        }

        $query = $this.$con->prepare("SELECT username from users where username=:un");
        $query->bindValue(":un", $un);
        $query->execute();

        if($query->rowCount() != 0) {
            array_push($errorsArray, Constants::$usernameTaken);
        }
    }

    public function getErrors($error)
    {
        if (in_array($error, $this->errorsArray)) {
            if (in_array($error, $this->errorsArray)) {
                return $error;
            }
        }
    }
}

?>