<?php
    namespace PasswordValidator;
    include_once "/srv/PasswordValidation/vendor/autoload.php";
  

       $obj = new PasswordValidator("aSi@546hf");
       $obj->strength();


       /*else if (($length < 6 && $this->hasUpperCaseCharacter()) || ($length < 6 && $this->hasDigit()) || ($length < 6 &&     $this->hasSpecialCharacter())) {
                $count = 40;
                return $count;
            } //weak
            /*else if ($length < 6 && $this->hasUpperCaseCharacter() && $this->hasDigit() && $this->hasSpecialCharacter()) {
                $count = 60;
                return $count;
            } //so so*/


?>