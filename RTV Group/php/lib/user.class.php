<?php

class Registration
{
    private $login;
    private $email;
    private $birth;
    private $password;

    public function __construct(array $data)
    {
        $this->login = isset($data['login']) ? $data['login']:null;
        $this->email = isset($data['email']) ? $data['email']:null;
        $this->birth = isset($data['birth']) ? $data['birth']:null;
        $this->password = isset($data['password']) ? $data['password']:null;
    }

    public function validation()
    {
        return !empty($this->login) && !empty($this->email) && !empty($this->birth) && !empty($this->password);
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

    public function getBirth()
    {
        return $this->birth;
    }

    public function setBirth($birth)
    {
        $this->birth = $birth;
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

class Login
{
    private $login;
    private $password;
    private $token;
    private $id;

    public function __construct(array $data)
    {
        if (isset($data['token'])){
            $this->token = isset($data['token']) ? $data['token'] : null;
        }elseif (isset($data['login']) && isset($data['password'])) {
            $this->login = isset($data['login']) ? $data['login'] : null;
            $this->password = isset($data['password']) ? $data['password'] : null;
            $this->token = md5(uniqid(mt_rand(), true));
        }
    }

    public function validation()
    {
        return !empty($this->login) && !empty($this->password);
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

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}

class User_data
{
    private $token;
    private $param;

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getParam()
    {
        return $this->param;
    }

    public function setParam($param)
    {
        $this->param = $param;
    }

//    public function __construct($data)
//    {
//        $this->token = isset($data['token']) ? $data['token'] : null;
//    }
//}        if (isset($data['token'])) {

}
?>