<?php
include ("db.model.php");
class Login
{
    private $login;
    private $password;

    public function __construct(Array $data)
    {
        $this->login = isset($data['login']) ? $data['login'] : null;
        $this->password = isset($data['password']) ? $data['password'] : null;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}

class Register
{
    private $login;
    private $email;
    private $password;

    public function __construct(Array $data)
    {
        $this->login = isset($data['login']) ? $data['login'] : null;
        $this->email = isset($data['email']) ? $data['email'] : null;
        $this->password = isset($data['password']) ? $data['password'] : null;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}
?>