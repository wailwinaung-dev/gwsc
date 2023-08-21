<?php
session_start();

include("../../../database/model/PitchTypesTable.php");
include("../../../helpers/HTTP.php");
include("../../../helpers/FLUSH.php");

$data = $_POST;

$campsite = new PitchTypesTable();

$campsite->update($data);

FLUSH::message('success', 'Pitch Type updated successfully.');
HTTP::redirect("/admin/pitchtype/index.php");
