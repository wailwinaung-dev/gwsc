<?php
session_start();

include("../../../database/model/FeaturesTable.php");
include("../../../helpers/HTTP.php");
include("../../../helpers/FLUSH.php");

$id = $_GET['id'];
$featuresTable = new FeaturesTable();
$feature = $featuresTable->findById($id);
// var_dump($feature);exit;
if($feature['package_count'] > 0){
    FLUSH::message('error', "Feature cannot be deleted because packages depend on it.");
    HTTP::redirect("/admin/feature/index.php");
}

$status = $featuresTable->delete($id);

FLUSH::message('success', 'Feature deleted successfully');
HTTP::redirect("/admin/feature/index.php");
