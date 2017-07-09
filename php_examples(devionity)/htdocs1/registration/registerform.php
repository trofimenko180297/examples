<?php

class RegistrationForm
{
	private $login;
	private $email;
	private $password;
	private $passwordconfirm;

    public function __construct(array $data)
	{
		$this->login=isset($data['login']) ? ($data['login']):null;
		$this->email=isset($data['email']) ? ($data['email']):null;
		$this->password=isset($data['password']) ? ($data['password']):null;
		$this->passwordconfirm=isset($data['passwordconfirm']) ? ($data['passwordconfirm']):null;
		//var_dump($this);
	}

    public function pass()
	{
		return $this->password == $this->passwordconfirm;
		
	
    }
	public function validate()
	{
		return !empty($this->login) && !empty($this->email) && !empty($this->password) && !empty($this->passwordconfirm) && $this->pass();
		
	}
	
	public function getlogin()
	{
		return $this->login;
	}
    
	public function getemail()
	{
		return $this->email;
	}
	
	public function getPassword()
	{
		return $this->password;
	}
	
	public function getPasswordconfirm()
	{
		return $this->passwordconfirm;
	}
	
	public function setlogin($login)
	{
		$this->login = $login;
	}
	
	public function setemail($email)
	{
		$this->email = $email;
	}
	
	public function setpassword($password)
	{
		$this->password = $password;
	}
	
	public function setpasswordconfirm($passwordconfirm)
	{
		$this->passwordconfirm = $passwordconfirm;
	}
}   






?>