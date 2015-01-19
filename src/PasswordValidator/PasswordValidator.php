<?php
namespace PasswordValidator;

class PasswordValidator
{
    private $password = "";
    public function __construct($password)
    {
        $this->password = $password;
    }
    public function hasEmpty()
    {
        if (empty($this->password)) {
            return true;
        } //empty($this->password)
        else {
            return false;
        }
    } //This function checks Password is empty
    public function passwordLengthValidation()
    {
        if (strlen($this->password) >= 6) {
            return true;
        } //strlen($this->password) >= 6
        else {
            return false;
        }
    } //This function checks Password length is greater than 6
    public function hasUpperCaseCharacter()
    {
        if (preg_match("([A-Z])", $this->password)) {
            return true;
        } //This case cheks for upper case character has present in password
        else {
            return false;
        }
    }
    public function hasDigit()
    {
        if (preg_match("([0-9])", $this->password)) {
            return true;
        } //This case cheks for digit has present in password
        else {
            return false;
        }
    }
    public function hasSpecialCharacter()
    {
        if (preg_match_all("([\W_])", $this->password)) {
            return true;
        } //This case cheks for special character(including '_' ) has present in password
        else {
            return false;
        }
    }
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
        if (strlen($this->password) >= 6) {
            foreach ($commonPassword as $value) {
                if ($this->password === $value) {
                    return true;
                } //This case cheks for comman password
                else {
                    $this->strength();
                }
            } //This case cheks if original password is not comman password then call to strength() function
        } //strlen($this->password) >= 6
    }
    public function strength()
    {
        $count;
        $length = strlen($this->password);
        if ($length == 0) {
            $this->hasEmpty();
        } //This case cheks for empty password
        elseif ($length < 6 && ($this->hasUpperCaseCharacter() || $this->hasDigit() || $this->hasSpecialCharacter())) {
            echo "Very Weak";
            return true;
        } //This case cheks for very weak password
        elseif ($length >= 6 && !($this->hasUpperCaseCharacter()&& $this->hasDigit() && $this->hasSpecialCharacter())) {
            echo "Weak";
            return true;
        } //This case cheks for weak password
        elseif ($length == 6 && $this->hasUpperCaseCharacter() && $this->hasDigit() && $this->hasSpecialCharacter()) {
            echo "Good!";
            return true;
        } //This case cheks for good password
        elseif ($length > 6 && $this->hasUpperCaseCharacter() && $this->hasDigit() && $this->hasSpecialCharacter()) {
            echo "Strong!";
            return true;
        } //This case cheks for strong password
    }
}
