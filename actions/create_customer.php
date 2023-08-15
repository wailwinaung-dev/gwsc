<?php

include("../database/MySql.php");
include("../database/model/CustomersTable.php");
include("../helpers/HTTP.php");

$data = [
    "first_name" => $_POST['first_name'] ?? 'Unknown',
    "sur_name" => $_POST['sur_name'] ?? 'Unknown',
    "email" => $_POST['email'] ?? 'Unknown',
    "phone" => $_POST['phone'] ?? 'Unknown',
    "address" => $_POST['address'] ?? 'Unknown',
    "password" => $_POST['password']
];

$table = new CustomersTable(new MySQL());

if( $table ) {
    $table->insert($data);
    HTTP::redirect("/login.php", "registered=true");
} else {
    HTTP::redirect("/register.php", "error=true");
}
