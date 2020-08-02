<?php

class Session
{
    public static function exist($name)
    {
        return (isset($_SESSION[$name])) ? true : false;
    }


    public static function set($name, $value)
    {
        return $_SESSION[$name] = $value;
    }

    public static function get($name)
    {
        return $_SESSION[$name];
    }
}
