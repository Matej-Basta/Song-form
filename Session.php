<?php

class Session
{
    //ONE object of this class that we'll create and keep
    public static $instance = null;

    //get that one Sesison instance
    //create it if it is not yet created
    public static function instance()
    {
        if(static::$instance === null) {
            static::$instance = new static;
        }

        return static::$instance;
    }


    //↓↓ object properties and methods below this point ↓↓
    //data from the $_SESSION
    public $data = [];

    PUBLIC $old_request = [];
    
    //initializes teh session
    public function __construct()
    {
        session_start();

        $this->data = $_SESSION;

        if (isset($_SESSION['flashed_data'])) {
            $this->data = array_merge($this->data, $_SESSION['flashed_data']);
            unset($_SESSION['flashed_data']);
        }

        if(isset($_SESSION["flashed_request"])) {
            $this->old_request = $_SESSION["flashed_request"];
            unset($_SESSION["flashed_request"]);
        }
    }

    //sets a value of an element of the session
    public function set($key, $value)
    {
        $this->data[$key] = $value;
        $_SESSION[$key] = $value;
    }

    //gets a value from the session or returns the value of $default if $key is not found
    public function get($key, $default = null)
    {
        return $this->data[$key] ?? $default;
    }

    //flashes a value into the session
    public function flash($key, $value)
    {
        if (!isset($_SESSION['flashed_data'])) {
            $_SESSION['flashed_data'] = [];
        }
        $_SESSION['flashed_data'][$key] = $value;

    }

    public function flashRequest()
    {
        $_SESSION["flashed_request"] = $_REQUEST;
    }
}