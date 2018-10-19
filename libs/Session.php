<?php

class Session
{
    public static function init()
    {
        session_start();
        ob_start();
    }

    public static function set($key, $value)
    {
        setcookie($key, $value, time() + (3600 * 1), '/');
        //$_SESSION[$key] =   $value;
    }

    public static function setSession($key, $value)
    {
        $_SESSION[$key] =   $value;
    }

    public static function get($key)
    {
        // if (isset($_SESSION[$key])) {
        //     return $_SESSION[$key];
        // }
        //return $key;
        //$_SESSION['loggedIn'] =  'lyl';

        //session_unset();
        //return $_SESSION[$key];
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }

    public static function destroy()
    {
        session_unset();
        // Session::set('loggedIn', false);
        setcookie("user_id", "", time() - (3600 * 1), '/');
        setcookie("aname", "", time() - (3600 * 1), '/');
        setcookie("DATE_OF_BIRTH", "", time() - (3600 * 1), '/');
        setcookie("STUDENT_PROGRAM", "", time() - (3600 * 1), '/');
        setcookie("STUDENT_ROLE", "", time() - (3600 * 1), '/');
    }
}
