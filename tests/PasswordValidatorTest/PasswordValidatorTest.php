<?php
namespace PasswordValidator;

include_once "/srv/PasswordValidation/vendor/autoload.php";

class PasswordValidatorTest extends \PHPUnit_Framework_TestCase
{
    public function testPasswordHasEmpty()
    {
        $obj = new PasswordValidator("");
        $this->assertEquals(true, $obj->hasEmpty());
    }
    public function testPasswordLengthLessThanSixCharacter()
    {
        $obj = new PasswordValidator("t@34F");
        $this->assertEquals(false, $obj->passwordLengthValidation());
    }
    public function testPasswordConsistAtleastOneUpperCaseCharacter()
    {
        $obj = new PasswordValidator("asFit#34F5");
        $this->assertEquals(true, $obj->hasUpperCaseCharacter());
    }
    public function testPasswordConsistAtleastOneDigit()
    {
        $obj = new PasswordValidator("3asFit@34F5");
        $this->assertEquals(true, $obj->hasDigit());
    }
    public function testPasswordConsistAtleastOneSpecialChararacter()
    {
        $obj = new PasswordValidator("asFit@3_5G");
        $this->assertEquals(true, $obj->hasSpecialCharacter());
    }
    public function testPasswordStrengthStrong()
    {
        $obj = new PasswordValidator("amiT@heda21");
        $this->assertEquals(true, $obj->strength());
    }
    public function testPasswordStrengthGood()
    {
        $obj = new PasswordValidator("aA@he2");
        $this->assertEquals(true, $obj->strength());
    }
    public function testPasswordStrengthVeryWeak()
    {
        $obj = new PasswordValidator("aA@h");
        $this->assertEquals(true, $obj->strength());
    }
    public function testPasswordStrengthWeak()
    {
        $obj = new PasswordValidator("afdsgA@h");
        $this->assertEquals(true, $obj->strength());
    }
    public function testPasswordIsComman()
    {
        $obj = new PasswordValidator("welcom@234");
        $this->assertEquals(true, $obj->isCommanPassword());
        $obj = new PasswordValidator("google.com");
        $this->assertEquals(true, $obj->isCommanPassword());
    }
}
