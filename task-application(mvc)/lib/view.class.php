<?php

class View
{
    protected $data;

    protected $path;

    protected static function getDefaultViewPath()
    {
        $router = App::getRouter();
        if( !$router){
            return false;
        }
        $controller_dir = $router->getController();
        $template_name = $router->getMethodPrefix().$router->getAction().'.html';

        return VIEWS_PATH.DS.$controller_dir.DS.$template_name;
    }

    public function __construct($data = array(), $path = null)
    {
        if( !$path){
            $path = self::getDefaultViewPath();
        }
        if( !file_exists($path)){
//            header("HTTP/1.0 404 Not Found");
//            exit;
            throw new Exception('File not found in path:'.$path);
        }
        $this->path = $path;
        $this->data = $data;
    }

    public function render()
    {
        $data = $this->data;

        ob_start();
        include($this->path);
        $content = ob_get_clean();

        return $content;
    }
}