<?php
namespace PasswordValidator;
include_once "/srv/PasswordValidation/src/PasswordValidator/PasswordValidator.php";

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
    
    public function testisLongerThanLimit()
    {
        //$expected = "password valid";
        $actual = $this->password->isLongerThanLimit();
        $this->assertEquals(true, $actual);
    }
    
    public function testhasUppercaseCharacter()
    {
        $password1 = new PasswordValidator("BHAPKAR");
        //$expected = "Gauri1";
        $actual    = $password1->hasUppercaseCharacter();
        $this->assertEquals(true, $actual);
    }
    public function testhasDigit()
    {
        //$expected = "password valid";
        $actual = $this->password->hasDigit();
        $this->assertEquals(true, $actual);
    }
    public function testhasSpecialCharacter()
    {
        //$expected = "password valid";
        $actual = $this->password->hasSpecialCharacter();
        $this->assertEquals(true, $actual);
    }
    
    public function testisPasswordStrength()
    {
        $password1 = new PasswordValidator("GAURI12");
        //$expected = "password invalid";
        $actual    = $password1->PasswordStrength();
        $this->assertEquals(50, $actual);
    }
    
    public function testisCommonPassword()
    {
        $password1 = new PasswordValidator("GAURI12");
        //$expected = "password invalid";
        $actual    = $password1->isCommonPassword();
        $this->assertEquals(true, $actual);
    }
    
    
    
}
?>