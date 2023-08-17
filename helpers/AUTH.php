<?php

include('HTTP.php');

class Auth
{
    static $loginUrl = '/login.php';

    static function check()
    {
        session_start();
        try{
            if(isset($_SESSION['user'])) {
                if($_SESSION['user']['is_admin']==false && str_contains($_SERVER['REQUEST_URI'],"admin")){
                    throw new Exception();
                }
                return $_SESSION['user'];
            } else {
                throw new Exception();
            }
        }catch(Exception $e){
            HTTP::redirect(static::$loginUrl);
        }
        
    }
}
