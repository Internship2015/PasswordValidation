<?php
namespace PasswordValidator;

class PasswordValidator
{
    /*
    Password should be longer than 6 characters
    Password should contain atleast one upper case letter
    Password should contain atleast one digit
    Password should contain atleast one special character
    Password should not be a common password
    */
    
    private $password;
    
    public function __construct($password)
    {
        $this->password = $password;
    }
    public function calculateLength()
    {
        if (strlen($this->password) >= 6) {
            return true;
        } else {
            return false;
        }
    }
    public function strength()
    {
        static $strength = 1;
        if (strlen($this->password) == 0) {
            return 0;
        }
        
        if (strlen($this->password) < 6) {
            return 1;
        }
        
        if ($this->calculateLength() && $this->hasLowercaseCharacter()) {
            $strength += 1;     
            return $strength;
        }
        
        if ($this->calculateLength() && hasSpecialCharacter()) {
            $strength += 1;
            return $strength;
        }
        if ($this->calculateLength() && hasDigit()) {
            $strength += 1;
            return $strength;
        }
        if ($this->calculateLength() && hasSpecialCharacter()) {
            $strength += 1;
            return $strength;
        }
        $str = "/[a-z][0-9][A-Z][|!@#$%&*\/=?,;.:\-_+~^\\\]/";
        if (preg_match_all($str, $this->password) && $this->calculateLength()) {
            $strength += 1;
            return $strength;
        }
    }
    public function hasLowercaseCharacter()
    {
        if (preg_match("([a-z])", $this->password)) {
            return true;
        } else {
            return false;
        }
    }
    public function hasSpecialCharacter()
    {
        if (preg_match("([\W])", $this->password)) {
            return true;
        } else {
            return false;
        }
    }
    public function hasUppercaseCharacter()
    {
        if (preg_match("([A-Z])", $this->password)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function hasDigit()
    {
        if (preg_match("([0-9])", $this->password)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function isLongerThanLimit()
    {
        if (strlen($this->password) >= 6) {
            return true;
        } else {
            return false;
        }
    }
    
    public function isCommonPassword()
    {
        $commonPassword = array(
            "123456",
            "password",
            "welcome",
            "abc123",
            "123456789",
            "12345678",
            "sunshine",
            "princess",
            "qwerty",
            "111111",
            "freedom",
            "monkey",
            "123456",
            "general"
        );
        if (!array_search($this->password, $commonPassword)) {
            return true;
        } else {
            return false;
        }
    }
}
