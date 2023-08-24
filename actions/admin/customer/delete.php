<?php
session_start();

include("../../../database/model/CustomersTable.php");
include("../../../helpers/HTTP.php");
include("../../../helpers/FLUSH.php");

$id = $_GET['id'];
$customersTable = new CustomersTable();
$customer = $customersTable->findById($id);

$customersTable->delete($id);

FLUSH::message('success', 'Customer deleted successfully');
HTTP::redirect("/admin/customer/index.php");
