<?php
session_start();

include("../database/MySql.php");
include("../database/model/CustomersTable.php");
include("../helpers/HTTP.php");

$email = $_POST['email'];
$password = $_POST['password'];
$table = new CustomersTable(new MySQL());
$user = $table->findByEmailAndPasword($email, $password);

if ($user) {
    $_SESSION['user'] = $user;
    HTTP::redirect("/home.php");
} else {
    HTTP::redirect("/index.php", "incorrect=1");
}
