<?php
session_start();

include("../../../database/model/AttractionsTable.php");
include("../../../helpers/HTTP.php");
include("../../../helpers/FLUSH.php");

$id = $_GET['id'];
$attractionsTable = new AttractionsTable();
$attraction = $attractionsTable->findById($id);
// var_dump($attraction);exit;
if($attraction['package_count'] > 0){
    FLUSH::message('error', "Attraction cannot be deleted because packages depend on it.");
    HTTP::redirect("/admin/attraction/index.php");
}

$status = $attractionsTable->delete($id);

FLUSH::message('success', 'Attraction deleted successfully');
HTTP::redirect("/admin/attraction/index.php");
