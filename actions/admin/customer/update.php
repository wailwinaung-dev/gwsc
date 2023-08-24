<?php
session_start();

include("../../../database/model/CustomersTable.php");
include("../../../helpers/HTTP.php");
include("../../../helpers/FLUSH.php");

$data = $_POST;
$customersTable = new CustomersTable();

$customersTable->update($data);

FLUSH::message('success', 'Customer updated successfully.');
HTTP::redirect("/admin/customer/index.php");
