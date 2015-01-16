<?php

namespace Password;

include_once "/../vendor/autoload.php";

include_once "/srv/PasswordValidation/anusha/src/PasswordValidator/Password.php";
//include 'Password.php';
class PasswordTest extends PHPUnit_Framework_TestCase
{
/**
* 
*/
//private $pasword;

    public function testLengthofpassword() 
          {
          $pasword = new Password("abg12III")
          $this->assertEquals($object,$pasword->passwordLengthValidation());
          }


       public function testUppercaseletter()
          {
           $object = true;
           $this->assertEquals($object,$this->pasword->validationOfUppercaseLetter());
          } 
       
       public function testSpecialSymbols()
          {
          $object = true;
          $this->assertEquals($object,$this->pasword->validationOfSpecialCharacter());
          } 
      
       public function testNumber()
           {
            $object = true;
            $this->assertEquals($object,$this->pasword->validationOfNumber());
            }   
       public function testCommonPassword()
            {
            $object = true;
            $this->assertEquals($object,$this->pasword->validationCommonPassword());
            }
                  }
 ?>