<?php

class Account
{
    private $con;
    private $errorsArray =  array();

    public function _construct($con)
    {
        $this->$con = $con;
    }

    public function validateFirstName($fn)
    {
        if (strlen($fn) < 2 || strlen($fn) > 25 ) {
            array_push($errorsArray, "Your first name wrong length");
        }
    }

    public function getErrors($error)
    {
        if (in_array($error, $this->errorsArray)) {
            if(in_array($error, $this->errorsArray)) {
                return $error;
            }            
        }
    }
}

?>
