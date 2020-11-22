<?php

class Session
{

    static public function set(string $name, $value)
    {
        $_SESSION[$name] = $value;
    }

    static public function get($name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
    }

    static public function show($name)
    {
        if (isset($_SESSION[$name])) {
            $key = self::get($name);
            self::remove($name);
            return $key;
        }
    }

    static public function remove($name)
    {
        unset($_SESSION[$name]);
    }

    static public function stop()
    {
        session_destroy();
    }
}
