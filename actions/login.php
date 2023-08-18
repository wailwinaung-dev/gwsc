<?php
session_start();

include("../database/model/CustomersTable.php");
include("../helpers/HTTP.php");
include("../helpers/FLUSH.php");

$email = $_POST['email'];
$password = $_POST['password'];
$table = new CustomersTable();
$customer = $table->findByEmailAndPasword($email, $password);

if ($customer) {
    $customer['is_admin'] = false;
    $_SESSION['user'] = $customer;
    HTTP::redirect("/home.php");
} else {
    FLUSH::message('error', 'Email or Password is incorrect.');
    HTTP::redirect("/login.php");
}
