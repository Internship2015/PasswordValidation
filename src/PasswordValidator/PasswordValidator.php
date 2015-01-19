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
    // to check password strength
    public function PasswordStrength()
    {
        
        if (preg_match_all("([a-z][A-Z][\d][\W])", $this->password)) {
            return 100;
        } else if (preg_match_all("([a-z][A-Z][\d])", $this->password)) {
            return 80;
        }
        
        if (preg_match_all("([A-Z][\d])", $this->password)) {
            return 50;
        }
        
        else if (preg_match("([a-z])", $this->password)) {
            return 20;
        }
        
    }
    

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

 if (strlen($this->password) >= 6) {
foreach ($commonPassword as $value) {
 if ($this->password != $value) {
 return true;
 }
}
 } else {
 foreach ($commonPassword as $value) {
 if ($this->password != $value) {
 return true;
 }
 }
}
}
}
 ?>