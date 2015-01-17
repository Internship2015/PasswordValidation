<?
include 'safepass.php';
include_once "/usr/local/bin/vendor/autoload.php";
class safepasstest extends \PHPUnit_Framework_TestCase{
	/**
     * @var \src\safepass
     */
		private $password;
		public function setUp()
    	{
			$this->password = new safepass();
		}
		public function testPasswordIsEmpty()
		{
				$expected = 0;
				$actual = $this->password->countsafepass("");
				$this->assertEmpty($expected, $actual);

		}
		public function testPasswordLengthIsTooShort()
		{
				$expected1 = "5";
				$actual1 = $this->password->countpasswordlength("asvd1");
				$this->assertEquals($expected1, $actual1);		
		
		}
		
		
		public function testPasswordIncludeAtleastOneNumber()
		{
				$expected = "aA1chas3";
				$actual = $this->password->testPasswordIncludeNumber("aA1chas3");
				$this->assertStringMatchesFormat($expected, $actual);
		}
		public function testPasswordIncludeAtleastOneUpperCase()
		{
				$expected = "dAkjkV";
				$actual = $this->password->passincludeul("dAkjkV");
				$this->assertStringMatchesFormat($expected, $actual);
		}
		public function testPasswordIncludeSpecialCharacters()
		{
				$expected = "@Afhjh$";
				$actual = $this->password->passwordincludespecialchars("@Afhjh$");
				$this->assertStringMatchesFormat($expected, $actual);
		}
		public function testPasswordCheckIsStrong()
		{
				$expected = "@Afh1j4h$ is a valid password";
				$actual = $this->password->checkpasswordisstrong("@Afh1j4h$");
				$this->assertEquals($expected, $actual);
		}
		public function testTestEasyPassword()
		{
				$expected = "test is NOT a valid password";
				$actual = $this->password->checkpasseasy("test");
				$this->assertEquals($expected, $actual);
		}
		



}
