<?php
  namespace PwdValid;
  include_once "/usr/local/bin/vendor/autoload.php";
  
 
 class PwdTest extends  \PHPUnit_Framework_TestCase
    { 
       public function testpwdEmpty()
    	 {    
    	        $obj=new PwdValid("");
               $this->assertEquals("please fill password in the place",$obj->isEmpty());
    	 }
    	

    	public function testpwdLengthValidation()
    	 {    
    	        $obj=new PwdValid("t@34F");
               $this->assertEquals("Password Length Short",$obj->lengthValidation());
    	 }
    	 	public function testpwdUpperCaseValidation()
    	 {  
    	 	  
               $obj=new PwdValid("asFit@34F5");
               $this->assertEquals("Password consist upper case",$obj->isUpperCase());
    	 }
    	 public function testpwddigitValidation()
    	 {
    	 	  
               $obj=new PwdValid("3asFit@34F5");
               $this->assertEquals("Password consist digit",$obj->isdigit());
    	 }
       public function testpwdSpecialCharValidation()
    	 { 
    	 	   $obj=new PwdValid("asFit@3_5G");
               $this->assertEquals("Password consist special character",$obj->isSpecial());
    	 }
    }

  
  ?>