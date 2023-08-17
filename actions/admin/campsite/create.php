<?php
session_start();

include("../../../database/model/CampsitesTable.php");
include("../../../helpers/HTTP.php");
include("../../../helpers/FLUSH.php");

$data = [
    "name" => $_POST['name'],
    "location" => $_POST['location']
];

$campsite = new CampsitesTable();

$campsite->insert($data);

FLUSH::message('success', 'Campsite added successfully.');
HTTP::redirect("/admin/campsite/index.php");
