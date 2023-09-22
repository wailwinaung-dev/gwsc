<?php
session_start();

include("../database/model/BookingsTable.php");
include("../helpers/HTTP.php");
include("../helpers/FLUSH.php");

$booking = new BookingsTable();
$_POST['subtotal'] = $_POST['price'] + (($_POST['price'] * 10) / 100);
$booking->insert($_POST);

FLUSH::message('success', 'Your booking added sucessfully.');
HTTP::redirect("/package_detail.php?id=" . $_POST['package_id']);

