<?php
  
   namespace PwdValid;

    class PwdValid
    {
  
        public function __construct($pwd)
         {
             $this->pwd=$pwd;
         }
          public function isEmpty()
          {
          	 if(empty($this->pwd))
              return "please fill password in the place";
          }
         public function lengthValidation()
         {

         	   if(strlen($this->pwd)<=5)

         	   {
         	   	 return "Password Length Short"; 
         	   }
         	   	
         }
         public function isUpperCase()
         {
         	 if(preg_match("([A-Z])",$this->pwd))
         	 {
                   return "Password consist upper case";
         	 }
         	 else
         	 	{ return "Password should contain one upper case";}
         }
          public function isdigit()
         {
         	 if(preg_match("(.[0-9])",$this->pwd))
         	 {
                   return "Password consist digit";
         	 }
         	 else
         	 	{ return "Password should contain atleast one digit";}
         }
           public function isSpecial()
         {
         	 if(preg_match("([\W])",$this->pwd))
         	 {
                   return "Password consist special character";
         	 }
         	 else
         	 	{ return "Password should contain atleast one special character";}
         }



    }
 ?>