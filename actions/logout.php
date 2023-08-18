<?php
session_start();

include("../helpers/HTTP.php");

$is_admin = $_SESSION['user']['is_admin'];

if(isset($_SESSION['user'])){
    $_SESSION['user'] = NULL;
}

if($is_admin){
    HTTP::redirect("/admin/auth/login.php");
}else{
    HTTP::redirect("/login.php");
}

