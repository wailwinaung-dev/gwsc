<?php
session_start();

include("../database/model/CustomersTable.php");
include("../helpers/HTTP.php");

$email = $_POST['email'];
$password = $_POST['password'];
$table = new CustomersTable();
$customer = $table->findByEmailAndPasword($email, $password);

if ($customer) {
    $_SESSION['customer'] = $customer;
    HTTP::redirect("/home.php");
} else {
    HTTP::redirect("/login.php", "incorrect=1");
}
