<?php
session_start();

include("../../../database/model/PackagesTable.php");
include("../../../helpers/HTTP.php");
include("../../../helpers/FLUSH.php");

$package = new PackagesTable();
$id = $_GET['id'];

$status = $package->delete($id);

FLUSH::message('success', 'Package deleted successfully');
HTTP::redirect("/admin/package/index.php");
