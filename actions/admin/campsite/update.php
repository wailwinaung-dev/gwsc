<?php
session_start();

include("../../../database/model/CampsitesTable.php");
include("../../../helpers/HTTP.php");
include("../../../helpers/FLUSH.php");

$data = $_POST;

$campsite = new CampsitesTable();

$campsite->update($data);

FLUSH::message('success', 'Campsite updated successfully.');
HTTP::redirect("/admin/campsite/index.php");
