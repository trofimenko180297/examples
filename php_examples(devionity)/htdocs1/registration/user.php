<?php

class RegistrationForm
{
	private $login;
	private $email;
	private $password;
	private $passwordConfirm;
}
    public function __construct(array $data)
	{
		$this->login=isset($data['login']) ? ($data['login']):null;
		$this->email=isset($data['email']) ? ($data['email']):null;
		$this->password=isset($data['password']) ? ($data['password']):null;
		$this->passwordConfirm=isset($data['passwordConfirm']) ? ($data['passwordConfirm']):null;
		
	}

    









?>