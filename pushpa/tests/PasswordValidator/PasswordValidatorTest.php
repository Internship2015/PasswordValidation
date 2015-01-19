<?php
namespace PasswordValidator;

include_once "../../vendor/autoload.php";
class PasswordValidatorTest extends \PHPUnit_Framework_TestCase
{
    public function testCheckPasswordStrength()
    {
        
        $password = new PasswordValidator("");
        $this->assertEquals(true, $password->strength());
        
        $password = new PasswordValidator("hbhh");
        $this->assertEquals(10, $password->strength());
        
        $password = new PasswordValidator("hghhfg");
        $this->assertEquals(20, $password->strength());
        
        $password = new PasswordValidator("hahAvas");
        $this->assertEquals(40, $password->strength());
        
        $password = new PasswordValidator("h2CakksA");
        $this->assertEquals(70, $password->strength());
        
        $password = new PasswordValidator("h@gA4&bg");
        $this->assertEquals(100, $password->strength());
    }
    public function testPasswordHasSpecialCharacter()
    {
        $password = new PasswordValidator("hgb@A3ha");
        $this->assertEquals(true, $password->hasSpecialCharacter());
    }
    public function testPasswordhasUppercaseCharacter()
    {
        $password = new PasswordValidator("hgb@A3ha");
        $this->assertEquals(true, $password->hasUppercaseCharacter());
    }
    public function testPasswordhasDigit()
    {
        $password = new PasswordValidator("hgb@A3ha");
        $this->assertEquals(true, $password->hasDigit());
    }
    public function testPasswordIsLongerThanLimit()
    {
        $password = new PasswordValidator("hgb@A3ha*!");
        $this->assertEquals(true, $password->isLongerThanLimit());
    }
    public function testCommonPasswordTest()
    {
        $password = new PasswordValidator("Abd13#");
        $this->assertEquals(true, $password->isCommonPassword());

        $password = new PasswordValidator("Fh23a");
        $this->assertEquals(true, $password->isCommonPassword());
    }
}
