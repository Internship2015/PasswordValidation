<?
class safepass{
	public function countsafepass($pwd)
	{
		$length = strlen($pwd);
		if($length == 0)
		return $length;	
	}
	public function countpasswordlength($pwd)
	{
		
		$length = strlen($pwd);
		return $length;	
	}
	
	public function passistoolong($pwd)
	{
				return strlen($pwd);	
	}
	public function passistooshort($pwd)
	{
		$length = strlen($pwd);
		return $length;	
	}
	public function testPasswordIncludeNumber($pwd)
	{
		if(preg_match_all('$\S*(?=\S*[a-z])(?=\S*[0-9])(?=\S*[A-Z])\S*$', $pwd))
		{	
			return $pwd;
		}
	}
//$error .= "Password must include at least one number! ";
	public function passincludeul($pwd)
	{
		if(preg_match_all('$\S*(?=\S*[A-Z])\S*$', $pwd)) {
			return $pwd;
		}	
	}
	public function passwordincludespecialchars($pwd)
	{
		//if (preg_match_all('$\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $pwd)){
	if(preg_match_all('$\S*(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\W])\S*$', $pwd))
			{
			return $pwd;
		}	
	}
	
	public function checkpasswordisstrong($pwd)
	{
		if(preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $pwd))
     		 return "$pwd is a valid password";
		else 
			 return "$pwd is NOT a valid password";
			
	}
	public function checkpasseasy($pwd)
	{
		if(preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $pwd))
     		return "$pwd is a valid password";
		else 
			 return "$pwd is NOT a valid password";
	}
}
