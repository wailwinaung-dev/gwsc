<?php

include("../helpers/AUTH.php");

$auth = Auth::check();

if(isset($_SESSION['customer'])){
    $_SESSION['customer'] = NULL;
}

HTTP::redirect("/login.php");


