<?php
namespace PasswordValidator;

include_once "../../vendor/autoload.php";

class PasswordValidatorTest extends \PHPUnit_Framework_TestCase
{

    public function testPasswordCanNotBeEmpty()
    {
        $obj = new PasswordValidator("");
        $this->assertEquals(true, $obj->isEmpty());
    }
    public function testMustBeAcceptPassedPassword()
    {
        $obj = new PasswordValidator("anf.Hdf588");
        $this->assertEquals("anf.Hdf588", $obj->getPassword());
    }
    public function testPasswordLengthMustBeLongerThanSixCharacter()
    {
        $obj = new PasswordValidator("t@34dfF");
        $this->assertEquals(true, $obj->isLengthLogerThanLimit());
    }
    public function testPasswordLengthShouldBeEqualToLimit()
    {
        $obj = new PasswordValidator("t@3HfF");
        $this->assertEquals(true, $obj->isLengthLogerThanLimit());
    }
    public function testPasswordLengthShouldNotLongerThanLimit()
    {
        $obj = new PasswordValidator("t@4fF");
        $this->assertEquals(false, $obj->isLengthLogerThanLimit());
    }
    public function testPasswordMustConsistAtleastOneUpperCaseCharacter()
    {
        $obj = new PasswordValidator("asFit#34F5");
        $this->assertEquals(true, $obj->hasUpperCaseCharacter());
    }
    public function testPasswordShouldNotConsistUpperCaseCharacter()
    {
        $obj = new PasswordValidator("fsi1t#d5");
        $this->assertEquals(false, $obj->hasUpperCaseCharacter());
    }
    public function testPasswordMustConsistAtleastOneDigit()
    {
        $obj = new PasswordValidator("3asFit@34F5");
        $this->assertEquals(true, $obj->hasDigit());
    }
    public function testPasswordShouldNotConsistDigit()
    {
        $obj = new PasswordValidator("asF%it@gdf");
        $this->assertEquals(false, $obj->hasDigit());
        $obj = new PasswordValidator("At@gdf");
        $this->assertEquals(false, $obj->hasDigit());
    
    }
    
    public function testPasswordMustConsistAtleastOneSpecialChararacter()
    {
        $obj = new PasswordValidator("asFit@3_5G");
        $this->assertEquals(true, $obj->hasSpecialCharacter());
        $obj = new PasswordValidator("~Ayuhgh99");
        $this->assertEquals(true, $obj->hasSpecialCharacter());
    }
    public function testPasswordShouldNotConsistSpecialChararacter()
    {
        $obj = new PasswordValidator("asFit35G");
        $this->assertEquals(false, $obj->hasSpecialCharacter());
         $obj = new PasswordValidator("fj48DFr");
        $this->assertEquals(false, $obj->hasSpecialCharacter());
    }
    public function testPasswordStrengthStrong()
    {
        $obj = new PasswordValidator("amiT@heda21");
        $this->assertEquals(4, $obj->strength());
    }
    public function testPasswordStrengthSoSo()
    {
        $obj = new PasswordValidator("aAhe2ggdf");
        $this->assertEquals(3, $obj->strength());
    }
    public function testPasswordStrengthVeryWeak()
    {
        $obj = new PasswordValidator("affg$");
        $this->assertEquals(1, $obj->strength());
    }
    public function testPasswordStrengthWeak()
    {
        $obj = new PasswordValidator("afdsg@h");
        $this->assertEquals(2, $obj->strength());
    }
    public function testPasswordMustBeEmpty()
    {
        $obj = new PasswordValidator("");
        $this->assertEquals(0, $obj->strength());
    }
    public function testPasswordMustBeComman()
    {
        $obj = new PasswordValidator("welcom@234");
        $this->assertEquals(5, $obj->strength());
       
    }

    public function testPasswordIsComman()
    {
        $obj = new PasswordValidator("welcom@234");
        $this->assertEquals(true, $obj->isCommanPassword());
        $obj = new PasswordValidator("google.com");
        $this->assertEquals(true, $obj->isCommanPassword());
        $obj = new PasswordValidator("general#127");
        $this->assertEquals(true, $obj->isCommanPassword());
    }
}
