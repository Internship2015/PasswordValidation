<?
include '../src/safepass.php';
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
		public function testPasswordLength()
		{
				$expected = 6;
				$actual = $this->password->countpasswordlength("ab1@Ccdef");
				$this->assertGreaterThanOrEqual($expected, $actual);
				
		}
		public function testPasswordIsTooLong()
		{
				$expected = 10;
				$actual = $this->password->passistoolong("Shjhjd$56nngg");
				$this->assertGreaterThan($expected, $actual);
		}
		public function testPasswordIsTooShort()
		{
				$expected = 3;
				$actual = $this->password->passistooshort("d1d");
				$this->assertEquals($expected, $actual);
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
