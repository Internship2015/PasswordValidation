<?php
namespace Password;

include_once "../../vendor/autoload.php";

class PasswordTest extends \PHPUnit_Framework_TestCase
{
    
    
    public function testCanBeEmpty()
    {
        $pasword = new Password("");
        $this->assertEquals(true,$pasword->isEmpty());
    }
    public function testCannotBeEmpty()
    {
        $pasword = new Password("afsfsfsdf");
        $this->assertEquals(false, $pasword->isEmpty());
    }
    
    public function testStrengthOfPassword()
    {
        
        $pasword = new Password("asA");
        $this->assertEquals(3, $pasword->strength());
        /*
        $pasword = new Password("AAasdsks67");
        $this->assertEquals(2, $pasword->strength());
        
        $pasword = new Password("anushA1268#");
        $this->assertEquals(3, $pasword->strength());

        $pasword = new Password("anushA126");
        $this->assertEquals(4, $pasword->strength());

        $pasword = new Password("anushA126");
        $this->assertEquals(5, $pasword->strength()); */
    }
    public function testLengthShouldBeLongerThanLimit()
    {   
        $pasword = new Password("abg12III");
        $this->assertEquals(true, $pasword->isLongerThanLimit());
    }
    public function testLengthMustNotBeLessThanLimit()
    {
        $pasword = new Password("abg12");
        $this->assertEquals(false, $pasword->isLongerThanLimit());
    }
    
    
    public function testShouldContainAtleastOneUpperCaseLetter()
    {
        $pasword = new Password("abg12III");
        $this->assertEquals(true, $pasword->hasUpperCaseLetter());
    }
     public function testMustContainAnyUpperCaseLetter()
    {
        $pasword = new Password("abg12iii");
        $this->assertEquals(false, $pasword->hasUpperCaseLetter());
    }
    
    public function testContainsAtleastOneSpecialCharacter()
    {
        $pasword = new Password("abg$#_12k");
        $this->assertEquals(true, $pasword->hasSpecialCharacter());
    }
    public function testMustContainAnySpecialCharacter()
    {
        $pasword = new Password("abgkkk12k");
        $this->assertEquals(false, $pasword->hasSpecialCharacter());
    }
    
    public function testContainsAtleastOneDigit()
    {
        $pasword = new Password("abA236#1");
        $this->assertEquals(true, $pasword->isDigit());
    }
    public function testMustContainAnyDigit()
    {
        $pasword = new Password("abAhgygjb@");
        $this->assertEquals(false, $pasword->isDigit());
    }
    
    public function testShouldContainCommonPassword()
    {
        $pasword = new Password("abA236#189");
        $this->assertEquals(false, $pasword->isCommonPassword());
    }
    public function testDoesNotContainCommonPassword()
    {
        $pasword = new Password("abA236#189");
        $this->assertEquals(false, $pasword->isCommonPassword());
    }
    

}
?>