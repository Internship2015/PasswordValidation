<?php
namespace Password;

class Password
{
    /*
    Password should be longer than 6 characters
    Password should contain atleast one upper case letter
    Password should contain atleast one digit
    Passwordshould contain atleast one special character
    There should not be a common password
    */
    
    private $password;
    
    public function __construct($password)
    {
        $this->password = $password;
        
    }
    
    /*This function is used to check whether the password is empty if
    it is empty it returns true*/
    
    public function isEmpty()
    {
        if (empty($this->password)) {
            return true;
        } else {
            return false;
        }
        
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
    /*This function calculates the strength of the password and returns is password is weak,strong */
    
    public function strength()
    {
        $strength = 0;
              

        if ($this->isLongerThanLimit()) {
            $strength += 1;
            
            
        }
        
        if ($this->hasUpperCaseLetter()) {
            $strength += 1;
            
        }
        
        if ($this->hasSpecialCharacter()) {
            $strength += 1;
            
        }
        
        if ($this->isDigit()) {
            $strength += 1;
            
        }
        if (!$this->isCommonPassword()) {
            $strength += 1;
            
        }
        return $strength;
    }
    /*This function is used for validating length of password and returns
    true if length is valid*/
    
    public function isLongerThanLimit()
    {
        if (strlen($this->password) <= 6) {
            return false;
        } else {
            return true;
        }
    }
    
    /*This function is used to check whether password has atleast one uppercase letter and returns true if it has atleast one uppercase letter*/
    
    public function hasUpperCaseLetter()
    {
        if (!preg_match("#[A-Z]#", $this->password)) {
            return false;
        } else {
            return true;
        }
    }
    
    /*This function is used to check whether password has atleast one special character returns true if it has atleast one  special character*/
    
    public function hasSpecialCharacter()
    {
        if (!preg_match("#[\W]#", $this->password)) {
            return false;
        } else {
            return true;
        }
    }
    
    /*This function is used to check whether password has atleast one digit*/
    
    public function isDigit()
    {
        if (!preg_match("#[0-9]#", $this->password)) {
            return false;
        } else {
            return true;
        }
    }
    /*This function is used to check comman passwords*/
    
    public function isCommonPassword()
    {
        $commanPasswords = array(
            "123456",
            "password",
            "welcome",
            "ninja",
            "abc123",
            "123456789",
            "sunshine",
            "qwerty"
        );
        if (in_array($this->password, $commanPasswords)) {
            return true;
        }
        
        
        else {
            return false;
        }
        
    }
    
}