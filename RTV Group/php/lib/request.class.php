<?php

class Request
{
    protected $uri;
    protected $id;
    protected $user;
    protected $params;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function setUri($uri)
    {
        $this->uri = $uri;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function setParams($params)
    {
        $this->params = $params;
    }

    public function __construct()
    {
                if (!empty($_GET['node']) && !empty($_GET['param'])) {
                    $this->id = $_GET['node'];
                    $this->params = $_GET['param'];
                }elseif (!empty($_GET['param'])) {
                    $this->params = $_GET['param'];
                }elseif (!empty($_GET['node'])) {
                    $this->id = $_GET['node'];
                }else{
                    $this->id = null;
                    $this->params = null;
                }
    }
}

?>