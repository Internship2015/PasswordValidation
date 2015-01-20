<?php
namespace PasswordValidator;

include_once "../../vendor/autoload.php";
class PasswordValidatorTest extends \PHPUnit_Framework_TestCase
{
    public function testIsEmpty()
    {
        $password = new PasswordValidator("");
        $this->assertEquals(true, $password->isEmpty());
    }
    public function testNotEmpty()
    {
        $password = new PasswordValidator("kshdkshka");
        $this->assertEquals(false, $password->isEmpty());
    }
    public function testCheckPasswordStrength()
    {
        $password = new PasswordValidator("");
        $this->assertEquals(0, $password->strength());
        
        $password = new PasswordValidator("monkey");
        $this->assertEquals(0, $password->strength());
        
        $password = new PasswordValidator("hahAvas");
        $this->assertEquals(2, $password->strength());
        
        $password = new PasswordValidator("h2CakksA");
        $this->assertEquals(3, $password->strength());
        
        $password = new PasswordValidator("h@g4bg");
        $this->assertEquals(3, $password->strength());
        
        $password = new PasswordValidator("h@gA4&bsdsg");
        $this->assertEquals(4, $password->strength());
    }
    
    public function testHasSpecialCharacter()
    {
        $password = new PasswordValidator("hgb@A3ha");
        $this->assertEquals(true, $password->hasSpecialCharacter());
    }
    
    public function testShouldContainSpecialCharacter()
    {
        $password = new PasswordValidator("hgbA3ha");
        $this->assertEquals(false, $password->hasSpecialCharacter());
    }
    
    public function testHasUppercaseCharacter()
    {
        $password = new PasswordValidator("hgb@A3ha");
        $this->assertEquals(true, $password->hasUppercaseCharacter());
    }
    
    public function testShouldContainUppercaseCharacter()
    {
        $password = new PasswordValidator("hgb@3ha");
        $this->assertEquals(false, $password->hasUppercaseCharacter());
    }
    
    public function testHasDigit()
    {
        $password = new PasswordValidator("hgb@A3ha");
        $this->assertEquals(true, $password->hasDigit());
    }
    
    public function testShouldContainDigit()
    {
        $password = new PasswordValidator("hgb@Aha");
        $this->assertEquals(false, $password->hasDigit());
    }
    
    public function testIsLongerThanLimit()
    {
        $password = new PasswordValidator("hgb@A3ha*!");
        $this->assertEquals(true, $password->isLongerThanLimit());
    }
    public function testMustBeLongerThanLimit()
    {
        $password = new PasswordValidator("hg@A*");
        $this->assertEquals(false, $password->isLongerThanLimit());
    }
    
    public function testIsCommonPassword()
    {
        $password = new PasswordValidator("welcome");
        $this->assertEquals(true, $password->isCommonPassword());
    }
    
    public function testNotCommonPassword()
    {
        $password = new PasswordValidator("Abd13#");
        $this->assertEquals(false, $password->isCommonPassword());
    }
}
