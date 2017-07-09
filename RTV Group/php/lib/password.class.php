<?php
require_once ("config.class.php");
class Password
{
    private $password;
    private $hashedPassword;
    private $salt;

    function __construct($password, $saltText = null)
    {
        $this->password = $password;
        $this->salt = Config::get("salt");
        $this->hashedPassword = md5($this->salt . $password);
    }

    public function __toString()
    {
        return $this->hashedPassword;
    }
}