<?php
namespace Password;

include_once "/srv/PasswordValidation/anusha/vendor/autoload.php";
//include_once  "src/PasswordValidator/";
class PasswordTest extends  PHPUnit_Framework_TestCase
{
    
    private $pasword;
    public function testContainsEmptyPassword()
    {
        $pasword = new Password("");
        $object  = true;
        $this->assertEquals($object, $this->pasword->isEmpty());
    }
    public function testMustNotContainEmptyPassword()
    {
        $pasword = new Password("afsfsfsdf");
        $object  = false;
        $this->assertEquals($object, $this->pasword->isEmpty());
    }
    
    public function testStrengthofPassword()
    {
        
        $pasword = new Password("anush36874");
        $this->assertEquals(1, $pasword->calculatestrength());
        
        $pasword = new Password("Aasdsks67");
        $this->assertEquals(2, $pasword->calculatestrength());
        
        $pasword = new Password("anushA1268#");
        $this->assertEquals(3, $pasword->calculatestrength());

        $pasword = new Password("anushA126");
        $this->assertEquals(4, $pasword->calculatestrength());

        $pasword = new Password("anushA126");
        $this->assertEquals(5, $pasword->calculatestrength());
    }
    public function testPasswordLengthShouldBeLongerThanLimit()
    {   
        $object  = true;
        $pasword = new Password("abg12III");
        $this->assertEquals($object, $pasword->isLongerThanLimit());
    }
    public function testPasswordLengthMustNotBeLongerThanLimit()
    {
        $object  = false;
        $pasword = new Password("abg12");
        $this->assertEquals($object, $pasword->isLongerThanLimit());
    }
    
    
    public function testShouldContainAtleastOneUpperCaseLetter()
    {
        $pasword = new Password("abg12III");
        $object  = true;
        $this->assertEquals($object, $this->pasword->hasUpperCaseLetter());
    }
     public function testCannotContainAnyUpperCaseLetter()
    {
        $pasword = new Password("abg12iii");
        $object  = false;
        $this->assertEquals($object, $this->pasword->hasUpperCaseLetter());
    }
    
    public function testMustContainSpecialCharacter()
    {
        $pasword = new Password("abg$#_12k");
        $object  = true;
        $this->assertEquals($object, $this->pasword->hasSpecialCharacter());
    }
    public function testMustnotContainAnySpecialCharacter()
    {
        $pasword = new Password("abgkkk12k");
        $object  = false
        $this->assertEquals($object, $this->pasword->hasSpecialCharacter());
    }
    
    public function testMustContainAtleastOneDigit()
    {
        $pasword = new Password("abA236#1");
        $object  = true;
        $this->assertEquals($object, $this->pasword->isDigit());
    }
    public function testCannotContainAnyDigit()
    {
        $pasword = new Password("abAhgygjb@");
        $object  = false;
        $this->assertEquals($object, $this->pasword->isDigit());
    }
    
    public function testItShouldContainCommonPassword()
    {
        $pasword = new Password("abA236#189");
        $object  = true;
        $this->assertEquals($object, $this->pasword->isCommonPassword());
    }
    public function testDoesNotContainCommonPassword()
    {
        $pasword = new Password("abA236#189");
        $object  = false;
        $this->assertEquals($object, $this->pasword->isCommonPassword());
    }
    

}
?>