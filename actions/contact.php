<?php
session_start();
include("../database/model/ContactsTable.php");
include("../helpers/HTTP.php");
include("../helpers/FLUSH.php");

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$message = $_POST['message'];

$table = new ContactsTable();

$data = [
    "first_name" => $first_name,
    "last_name" => $last_name,
    "email" => $email,
    "message" => $message
];

$table->insert($data);

FLUSH::message('success', 'Attraction added successfully.');
HTTP::redirect("/contact.php");