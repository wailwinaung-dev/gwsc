<?php
session_start();

include("../../../database/model/PitchTypesTable.php");
include("../../../helpers/HTTP.php");
include("../../../helpers/FLUSH.php");

$id = $_GET['id'];
$pitchTypesTable = new PitchTypesTable();
$pitchType = $pitchTypesTable->findById($id);

if($pitchType['package_count'] > 0){
    FLUSH::message('error', "Pitch Type cannot be deleted because packages depend on it.");
    HTTP::redirect("/admin/pitchtype/index.php");
}

$status = $pitchTypesTable->delete($id);

FLUSH::message('success', 'Pitch Type deleted successfully');
HTTP::redirect("/admin/pitchtype/index.php");
