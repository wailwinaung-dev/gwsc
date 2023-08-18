<?php

include('HTTP.php');

class Auth
{

    static function check()
    {
        session_start();

        //admin url
        if(str_contains($_SERVER['REQUEST_URI'],"admin")){
            //check already login
            if(isset($_SESSION['admin'])) {
                return $_SESSION['admin'];
            } else {
                HTTP::redirect('/admin/auth/login.php');
            }
        }
        else{//customer url
            //check already login
            if(isset($_SESSION['customer'])) {
                return $_SESSION['customer'];
            } else {
                HTTP::redirect('/login.php');
            }
        }
        
    
        
    }
}
