<?php
//namespace test;
include 'Password.php';
class PasswordTest extends PHPUnit_Framework_TestCase
{
/**
* 
*/
private $pswd;


 public function setUp()
     {

     $this->pswd = new Password();

      }


    public function testLengthofpassword() 
          {
          $object = true;
          $this->assertEquals($object,$this->pswd->passwordLengthValidation("fghgfhhhf"));
          }


       public function testUppercaseletter()
          {
           $object = true;
           $this->assertEquals($object,$this->pswd->validationOfUppercaseLetter("asnnA1*"));
          } 
       
       public function testspecialsymbols()
          {
          $object = true;
          $this->assertEquals($object,$this->pswd->validationOfSpecialCharacter("asnnA1*#"));
          } 
      
       public function testNumber()
           {
            $object = true;
            $this->assertEquals($object,$this->pswd->validationOfNumber("asnn231*#"));
            }   
       public function testCommonpassword()
            {
            $object = true;
            $this->assertEquals($object,$this->pswd->validationCommonPassword("anusha"));
            }
                  }
 ?>