<?php
session_start();

include("../../../database/model/AdminsTable.php");
include("../../../helpers/HTTP.php");
include("../../../helpers/FLUSH.php");

$id = $_GET['id'];
$adminsTable = new AdminsTable();
$admin = $adminsTable->findById($id);

$adminsTable->delete($id);

FLUSH::message('success', 'Admin deleted successfully');
HTTP::redirect("/admin/admin/index.php");
