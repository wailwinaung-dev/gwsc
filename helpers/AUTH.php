<?php

include('HTTP.php');

class Auth
{
    static $loginUrl = '/login.php';

    static function check()
    {
        session_start();

        if(isset($_SESSION['customer'])) {
            return $_SESSION['customer'];
        } else {
            HTTP::redirect(static::$loginUrl);
        }
    }
}
