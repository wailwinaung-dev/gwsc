<?php

include("../../../helpers/AUTH.php");

$auth = Auth::check();

if(isset($_SESSION['admin'])){
    $_SESSION['admin'] = NULL;
}

HTTP::redirect("/admin/auth/login.php");


