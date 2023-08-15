<?php
session_start();

include("../helpers/HTTP.php");

if(isset($_SESSION['user'])){
    $_SESSION['user'] = NULL;
}
HTTP::redirect("/login.php");

