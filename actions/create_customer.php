<?php
session_start();

include("../database/model/CustomersTable.php");
include("../helpers/HTTP.php");
include("../helpers/FLUSH.php");

$data = [
    "first_name" => $_POST['first_name'],
    "sur_name" => $_POST['sur_name'],
    "email" => $_POST['email'],
    "phone" => $_POST['phone'],
    "address" => $_POST['address'],
    "password" => $_POST['password']
];

$customer = new CustomersTable();

if( $customer) {
    //check email if exist or not
    if( $customer->findByEmail($data['email']) > 0 ){
        FLUSH::message('error', 'Email is already exits.');
        HTTP::redirect("/register.php", "email=true");
    }

    $customer->insert($data);
    FLUSH::message('success', 'Account created. Please login.');
    HTTP::redirect("/login.php");
} else {
    FLUSH::message('error', 'Something is going wrong.');
    HTTP::redirect("/register.php");
}
