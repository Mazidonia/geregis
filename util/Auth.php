<?php
/**
 * 
 */
class Authen
{
    
    public static function handleLogin()
    {
        Session::init();
        $logged = Session::get('user_id');
        if ($logged == "") {
            Session::destroy();
            header('location: login');
            exit;
        }
    }
    
}