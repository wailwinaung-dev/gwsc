<?php
session_start();

include("../../../database/model/PitchTypesTable.php");
include("../../../helpers/HTTP.php");
include("../../../helpers/FLUSH.php");

$data = [
    "name" => $_POST['name'],
];

$campsite = new PitchTypesTable();

$campsite->insert($data);

FLUSH::message('success', 'Pitch Type added successfully.');
HTTP::redirect("/admin/pitchtype/index.php");
