<?php
session_start();

include("../../../database/model/CampsitesTable.php");
include("../../../helpers/HTTP.php");
include("../../../helpers/FLUSH.php");

$id = $_GET['id'];
$campsitesTable = new CampsitesTable();
$campsite = $campsitesTable->findById($id);

if($campsite['package_count'] > 0){
    FLUSH::message('error', "Campsite cannot be deleted because packages depend on it.");
    HTTP::redirect("/admin/campsite/index.php");
}

$status = $campsitesTable->delete($id);

FLUSH::message('success', 'Campsite deleted successfully');
HTTP::redirect("/admin/campsite/index.php");
