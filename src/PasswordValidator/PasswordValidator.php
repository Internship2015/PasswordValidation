<?php
namespace PasswordValidator;

class PasswordValidator
{
    
    /*
    should be longer than 6 characters
    should contain atleast one upper case letter
    Class should contain atleast one digit
    should contain atleast one special character
    should not be a common password
    */
    
    private $password = "";
    
    public function __construct($password)
    {
        
        $this->password = $password;
        
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
    // to check password contain special character
    
    public function hasSpecialCharacter()
    {
        if (preg_match("([\W])", $this->password)) {
            return true;
        } else {
            return false;
            
        }
        
    }
    
    // to check password contain uppercase character
    
    public function hasUppercaseCharacter()
    {
        if (preg_match("([A-Z])", $this->password)) {
            return true;
        } else {
            return false;
            
        }
    }
    
    // to check password contain a digit
    
    public function hasDigit()
    {
        if (preg_match("([0-9])", $this->password)) {
            return true;
        } else {
            return false;
            
        }
        
    }
    
    // to check password length which is greater than or equal to 6
    
    public function isLongerThanLimit()
    {
        
        if (strlen($this->password) >= 6) {
            return true;
        } else {
            return false;
        }
    }
    //To check Password strength
    public function passwordStrength()
    {
        $strength = 0;
        
        if ((!$this->isLongerThanLimit()) || $this->isCommonPassword()) {
            return 0;
        }
        
        if ($this->hasUppercaseCharacter()) {
            $strength += 1;
            
        }
        if ($this->hasSpecialCharacter()) {
            $strength += 1;
            
        }
        
        if ($this->hasDigit()) {
            $strength += 1;
            
        }
               
        return $strength;
    }
    
    //to check password common password
    
    public function isCommonPassword()
    {
        $commonPassword = array(
            "welcome",
            "ninja",
            "abc123",
            "12345678",
            "sunshine",
            "princess",
            "qwerty",
            "111111",
            "freedom",
            "jesus",
            "monkey",
            "123456",
            "general"
        );
        
        if (in_array($this->password, $commonPassword)) {
            return true;
        } else {
            return false;
        }
        
        
    }
}
