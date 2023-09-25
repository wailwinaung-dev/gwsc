<?php
session_start();

include("../database/model/CustomersTable.php");
include("../helpers/HTTP.php");
include("../helpers/FLUSH.php");
include("../helpers/RECAPTCHA.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the login_fail session variable is set and the timeout has passed
    if (isset($_SESSION['login_fail']) && isset($_SESSION['login_fail']['time']) && $_SESSION['login_fail']['time'] <= time()) {
        unset($_SESSION['login_fail']); // Unset the login_fail session variable
    }

    $responseData = RECAPTCHA::check();//check google recaptcha
    if ($responseData->success) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $table = new CustomersTable();
    $customer = $table->findByEmailAndPasword($email, $password);

    if ($customer) {
        //increate view count
        $customer['view_count'] =  $customer['view_count'] + 1;
        $table->increaseViewCount($customer['id'], $customer['view_count']);
        $_SESSION['customer'] = $customer; //for auth
        unset($_SESSION['login_fail']);
        HTTP::redirect("/home.php");
    } else {
        //if first time fail, add 1 and if upper, + 1
        if (isset($_SESSION['login_fail'])) {
            $_SESSION['login_fail']['count'] =  $_SESSION['login_fail']['count'] + 1;
            if ($_SESSION['login_fail']['count'] > 4) {
                $_SESSION['login_fail']['time'] = time() + (5 * 60);
            }
        } else {
            $_SESSION['login_fail']['count'] = 1;
        }

        FLUSH::message('error', 'Email or Password is incorrect.');
        HTTP::redirect("/login.php");
    }

    } else {
        FLUSH::message('error', 'Please check the captcha form.');
        HTTP::redirect("/login.php");
    }
}
