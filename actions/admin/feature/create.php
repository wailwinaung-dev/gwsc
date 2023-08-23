<?php
session_start();

include("../../../database/model/FeaturesTable.php");
include("../../../helpers/HTTP.php");
include("../../../helpers/FLUSH.php");

$data = [
    "name" => $_POST['name'],
    "description" => $_POST['description'],
];

$feature = new FeaturesTable();

$name = $_FILES['image']['name'];
$error = $_FILES['image']['error'];
$tmp = $_FILES['image']['tmp_name'];
$type = $_FILES['image']['type'];
$imageFileType = strtolower(pathinfo($name,PATHINFO_EXTENSION));

if ($error) {
    FLUSH::message('error', 'Something is wrong in uploading image.');
    HTTP::redirect("/admin/feature/add.php");
}

if ($imageFileType === "jpeg" or $imageFileType === 'jpg' or $imageFileType === "png") {

    $file_name = uniqid() . '.' .  $imageFileType;
    move_uploaded_file($tmp, "../../photos/features/" . $file_name);

    $data['image'] = $file_name;

    $feature->insert($data);

    FLUSH::message('success', 'Feature added successfully.');
    HTTP::redirect("/admin/feature/index.php");
} else {
    FLUSH::message('error', 'Only JPEG and PNG files are allowed');
    HTTP::redirect("/admin/feature/add.php");
}
