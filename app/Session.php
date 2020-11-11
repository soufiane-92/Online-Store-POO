<?php

class Session
{
    static $currentSession;
    public $session;

    public function __construct($session)
    {
        $this->session = $session;
        self::$currentSession = $this;
    }

    public function set(string $name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function get($name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
    }

    public function show($name)
    {
        if (isset($_SESSION[$name])) {
            $key = $this->get($name);
            $this->remove($name);
            return $key;
        }
    }

    public function remove($name)
    {
        unset($_SESSION[$name]);
    }

    public function stop()
    {
        session_destroy();
    }
}
