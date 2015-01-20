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
        $actual = $password1->isLongerThanLimit();
        $this->assertEquals(false, $actual);
    }
    
    public function testShouldBeUppercaseCharacter()
    {
        $password1 = new PasswordValidator("BHAPKAR");
        $actual    = $password1->hasUppercaseCharacter();
        $this->assertEquals(true, $actual);
    }

    public function testShouldNotBeWithoutUppercaseCharacter()
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
    public function testShouldNotBeWithoutDigit()
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

    public function testShouldNotBeWithoutSpecialCharacter()
    {
        $password1 = new PasswordValidator("bhapkar");
        $actual    = $password1->hasSpecialCharacter();
        $this->assertEquals(false, $actual);
        
    }

    public function testPasswordStrengthVeryWeak()
    {
        $password1 = new PasswordValidator("");
        
        $actual    = $password1->PasswordStrength();
        $this->assertEquals(1, $actual);
    }

     public function testPasswordStrengthWeak()
    {
        $password1 = new PasswordValidator("HIII");
        
        $actual    = $password1->PasswordStrength();
        $this->assertEquals(2, $actual);
    }
    
    public function testPasswordVeryGood()
    {
        $password1 = new PasswordValidator("bhapkar");
        
        $actual    = $password1->PasswordStrength();
        $this->assertEquals(2, $actual);
    }

    public function testPasswordStrengthStrong()
    {
        $password1 = new PasswordValidator("Gau123&&");
        $actual    = $password1->PasswordStrength();
        $this->assertEquals(5, $actual);
    }
    
    public function testShouldNotBeCommonPassword()
    {
        $password1 = new PasswordValidator("GAURI12");
        $actual    = $password1->isCommonPassword();
        $this->assertEquals(true, $actual);
    }
    
     public function testShouldBeNotCommonPassword()
    {
        $password1 = new PasswordValidator("jesus");
        $actual    = $password1->isCommonPassword();
        $this->assertEquals(false, $actual);
    }
}
?>

