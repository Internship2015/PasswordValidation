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
    public function strength()
    {
        if (strlen($this->password) == 0) {
            return true;
        }
        if (strlen($this->password) >= 6) {
            if (preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $this->password)) {
                return 100;
            } elseif (preg_match_all('$\S*(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$', $this->password)) {
                return 70;
            } elseif (preg_match_all('$\S*(?=\S*[a-z])(?=\S*[A-Z])\S*$', $this->password)) {
                return 40;
            } elseif (preg_match("([a-z])", $this->password)) {
                return 20;
            }
            
        } else {
            return 10;
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
            "ninja",
            "abc123",
            "123456789",
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
