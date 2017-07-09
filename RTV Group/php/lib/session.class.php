<?php
abstract class Session
{
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }


    public static function get($key)
    {
        if(self::has($key))
        {
            return $_SESSION[$key];
        }else{
            return null;
        }
    }

    public static function has($key)
    {
        return isset($_SESSION[$key]);
    }

    public static function delete($key)
    {
        unset($_SESSION[$key]);
    }


    public static function destroy()
    {
        session_destroy();
    }
}
?>