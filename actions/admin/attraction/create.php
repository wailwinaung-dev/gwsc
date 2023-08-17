<?php
session_start();

include("../../../database/model/AttractionsTable.php");
include("../../../helpers/HTTP.php");
include("../../../helpers/FLUSH.php");

$data = [
    "name" => $_POST['name'],
    "description" => $_POST['description'],
    "location" => $_POST['location']
];

$attraction = new AttractionsTable();

$name = $_FILES['image']['name'];
$error = $_FILES['image']['error'];
$tmp = $_FILES['image']['tmp_name'];
$type = $_FILES['image']['type'];
$imageFileType = strtolower(pathinfo($name,PATHINFO_EXTENSION));

if ($error) {
    FLUSH::message('error', 'Something is wrong in uploading image.');
    HTTP::redirect("/admin/attraction/add.php");
}

if ($type === "image/jpeg" or $type === "image/png") {

    $file_name = uniqid() . '.' .  $imageFileType;
    move_uploaded_file($tmp, "../../photos/attractions/" . $file_name);

    $data['image'] = $file_name;

    $attraction->insert($data);

    FLUSH::message('success', 'Attraction added successfully.');
    HTTP::redirect("/admin/attraction/index.php");
} else {
    FLUSH::message('error', 'Image Type ');
    HTTP::redirect("/admin/attraction/add.php");
}
