<?php
namespace PasswordValidator;

include_once "../../vendor/autoload.php";


class PasswordValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PasswordValidator\PasswordValidator
     */
    private $password;
    
    public function setUp()
    {
        
        $this->password = new PasswordValidator("gsuri@&&&1235");
        
    }
    
    public function testMustBeLongerThanLimit()
    {
        
        $actual = $this->password->isLongerThanLimit();
        $this->assertEquals(true, $actual);
    }
    public function testCanNotBeLessThanLimit()
    {
        $password1 = new PasswordValidator("gau");
        $actual    = $password1->isLongerThanLimit();
        $this->assertEquals(false, $actual);
    }
    
    public function testShouldBeUppercaseCharacter()
    {
        $password1 = new PasswordValidator("BHAPKAR");
        $actual    = $password1->hasUppercaseCharacter();
        $this->assertEquals(true, $actual);
    }
    
    public function testMustContainAtleastOneUppercaseCharacter()
    {
        $password1 = new PasswordValidator("bhapkar");
        $actual    = $password1->hasUppercaseCharacter();
        $this->assertEquals(false, $actual);
    }
    
    public function testShouldBeDigit()
    {
        $password1 = new PasswordValidator("gau12345");
        $actual    = $password1->hasDigit();
        $this->assertEquals(true, $actual);
    }
    public function testMustContainAtleastOneDigit()
    {
        $password1 = new PasswordValidator("bhapkar");
        $actual    = $password1->hasDigit();
        $this->assertEquals(false, $actual);
    }
    
    public function testShouldBeSpecialCharacter()
    {
        $password1 = new PasswordValidator("bhapkar&&**");
        $actual    = $password1->hasSpecialCharacter();
        $this->assertEquals(true, $actual);
    }
    
    public function testMustContaionAtleastOneSpecialCharacter()
    {
        $password1 = new PasswordValidator("bhapkar");
        $actual    = $password1->hasSpecialCharacter();
        $this->assertEquals(false, $actual);
        
    }
    
    public function testStrengthVeryWeak()
    {
        $password1 = new PasswordValidator("");
        
        $actual = $password1->PasswordStrength();
        $this->assertEquals(0, $actual);
    }
    
    public function testStrengthWeak()
    {
        $password1 = new PasswordValidator("WELLCOME");
        
        $actual = $password1->PasswordStrength();
        $this->assertEquals(1, $actual);
    }
    
    public function testStrengthVeryGood()
    {
        $password1 = new PasswordValidator("WE#&&&*");
        
        $actual = $password1->PasswordStrength();
        $this->assertEquals(2, $actual);
    }
    
    public function testStrengthStrong()
    {
        $password1 = new PasswordValidator("Gau123&&");
        $actual    = $password1->PasswordStrength();
        $this->assertEquals(3, $actual);
    }
    
    public function testNotCommonPassword()
    {
        $password1 = new PasswordValidator("1243@fff");
        $actual    = $password1->isCommonPassword();
        $this->assertEquals(false, $actual);
    }
    
    public function testIsCommonPassword()
    {
        $password1 = new PasswordValidator("jesus");
        $actual    = $password1->isCommonPassword();
        $this->assertEquals(true, $actual);
    }
}
