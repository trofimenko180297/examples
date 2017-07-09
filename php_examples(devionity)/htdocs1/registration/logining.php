<?php
class Loginform
{
	private $login;
	private $password;

 
     public function __construct(Array $data)
	 {
		 $this->login=isset($data['login']) ? $data['login']:null;
		 $this->password=isset($data['password']) ? $data['password']:null;
	 }

    public function validate()
	{
		return !empty($this->login) && !empty($this->password);
	}
	
	public function getlogin()
	{
		return $this->login;
	}
	
	public function getpassword()
	{
		return $this->password;
	}
	
	public function setlogin($login)
	{
		$this->login = $login;
	}
	
	public function setpassword($password)
	{
		$this->password = $password;
	}


}


?>