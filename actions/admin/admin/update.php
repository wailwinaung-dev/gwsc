<?php
session_start();

include("../../../database/model/AdminsTable.php");
include("../../../helpers/HTTP.php");
include("../../../helpers/FLUSH.php");

$data = $_POST;
$adminsTable = new AdminsTable();

$adminsTable->update($data);

FLUSH::message('success', 'Admin updated successfully.');
HTTP::redirect("/admin/admin/index.php");
