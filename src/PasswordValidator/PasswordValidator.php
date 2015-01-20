<?php
namespace PasswordValidator;

class PasswordValidator
{
    private $password = "";
    public function __construct($password)
    {
        $this->password = $password;
    }
    
    public function getPassWord()
    {
        return $this->password;
    }
    
    public function calculateLength()
    {
        return strlen($this->password);
    }
    
    public function isEmpty()
    {
        if (empty($this->password)) {
            return true;
        } else {
            return false;
        }
    }
    
    /** This function checks Password length is greater than 6
     * @return boolean
     */
    
    public function isLengthLogerThanLimit()
    {
        if (strlen($this->password) >= 6) {
            return true;
        } else {
            return false;
        }
    }
    
    /** This function cheks for upper case character has present in password
     * @return boolean
     */
    
    public function hasUpperCaseCharacter()
    {
        if (preg_match("([A-Z])", $this->password)) {
            return true;
        } else {
            return false;
        }
    }
    
    /** This function cheks for digit has present in password
     * @return boolean
     */
    
    public function hasDigit()
    {
        if (preg_match("([0-9])", $this->password)) {
            return true;
        } else {
            return false;
        }
    }
    
    /** This function cheks for special character has present in password
     * @return boolean
     */
    
    public function hasSpecialCharacter()
    {
        if (preg_match_all("([\W_])", $this->password)) {
            return true;
        } else {
            return false;
        }
    }
    
    /** This function cheks for comman password
     * @return boolean
     */
    
    public function isCommanPassword()
    {
        $commonPassword = array(
            "google.com",
            "password@123",
            "welcom@234",
            "ninja$999",
            "abc_123",
            "jesus@786",
            "monkey*999",
            "general#127"
        );
        if (in_array($this->password, $commonPassword)) {
            return true;
        } else {
            return false;
        }
    }
    
    /** This function checks Password strength(in numeric(0-5))
     * @return integer [0-Empty,1-very weak,2-weak,3-so-so,4-strong]
     */
    
    public function strength()
    {
        $count = 0;
        if ($this->isEmpty() || $this->isCommanPassword()) {
            return $count;
        }
        if ($this->hasUpperCaseCharacter()) {
            $count += 1;
        }
        if ($this->hasSpecialCharacter()) {
            $count += 1;
        }
        if ($this->hasDigit()) {
            $count += 1;
        }
        if ($this->isLengthLogerThanLimit()) {
            $count += 1;
        }
        return $count;
    }
}
