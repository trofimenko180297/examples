<?php
require_once ("../config.php");
require_once ("../lib/user.class.php");
class Config
{
    protected static $settings = array();

    public static function get($key)
    {
        return isset(self::$settings[$key]) ? self::$settings[$key]:null;
    }

    public static function set($key, $value)
    {
        self::$settings[$key] = $value;
    }
}

?>