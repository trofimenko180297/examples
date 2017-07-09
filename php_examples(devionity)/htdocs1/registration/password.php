<?php

class Password
{
	const SALT_TEXT = 'Yes, Mr White! Yes, science!';
	
	private $password;
	private $hashpassword;
	private $salt;
	
	public function __construct($password, $saltText = null)
	{
	  $this->password = $password;
      $this->salt = md5(is_null($saltText) ? self::SALT_TEXT : $saltText );
      $this->hashpassword=md5($this->salt . $password);	  
	}
	
	public function __toString()
	{
		return $this->hashpassword;
	}
	
}






?>