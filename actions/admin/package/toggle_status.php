<?php
session_start();

include("../../../database/model/PackagesTable.php");
include("../../../helpers/HTTP.php");
include("../../../helpers/FLUSH.php");

$package = new PackagesTable();
$id = $_GET['id'];
// var_dump($id);exit;
$status = $package->toggleStatus($id);

$message = $status ? 'Package enabled successfully' : 'Package disabled successfully';

FLUSH::message('success', $message);
HTTP::redirect("/admin/package/view.php?id=" . $id);
