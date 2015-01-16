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
        $this->password=$password;

    }
    /*This function is used to check whether the password is empty*/
    public function passwordIsEmpty()
    {
        if (empty($this->$password)) {
            return true;
        } else {
            $this->password;
        }
        
    }
    public function getPassword()
    {
        return $this->password;
    }
    /*This function calculates the strength of the password*/
    public function passwordStrength ()
    {
       
       if(strlen($password)<6)
       {
         return 10;
       }     
       elseif(strlen($password)>=6)
        {
        if(preg_match_all("#[A-Z]+#", $password))
        {
            return 20;
        } 
      }
       elseif(strlen($password)>=6) 
       {
        if(preg_match_all("#[a-z/A-Z/0-9]+#", $password))
       {
        return 100;
       }
     } 
   }
      /*This function is used for validating length of password*/
    public function passwordLengthValidation()
    {
        if (strlen($password)< 6) {
            return false;
        } else {
            return true;
        }
    }
    /*This function is used to check whether password has atleast one uppercase letter*/
    public function validationOfUppercaseLetter()
    {
        if (!preg_match("#[A-Z]+#", $password)) {
            return false;
        } else {
            return true;
        }
    }
    /*This function is used to check whether password has atleast one special character*/
    public function validationOfSpecialCharacter()
    {
        if (!preg_match("#[\W]+#", $password)) {
            return false;
        } else {
            return true;
        }
    }
     /*This function is used to check whether password has atleast one number*/
    public function validationOfNumber()
    {
        if (!preg_match("#[0-9]+#", $password)) {
            return false;
        } else {
            return true;
        }
    }
    /*This function is used to check comman passwords*/
    public function isCommonPassword()
    {
        $commanPasswords = array("123456",
                                "password",
                                "welcome",
                                 "ninja",
                                 "abc123",
                                 "123456789",
                                 "sunshine",
                                 "qwerty",
         ); 
       
        if (strlen($this->password) >= 6) {
            foreach ($commonPassword as $value) {
                if ($this->password != $value) {
                    return true;
                }
                
            } 
         else
           {
              return false;
            }
         }
      }
    }  