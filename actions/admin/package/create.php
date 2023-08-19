<?php
session_start();

include("../../../database/model/PackagesTable.php");
include("../../../helpers/HTTP.php");
include("../../../helpers/FLUSH.php");

$data = $_POST;

$package = new PackagesTable();

$name = $_FILES['image']['name'];
$error = $_FILES['image']['error'];
$tmp = $_FILES['image']['tmp_name'];
$imageFileType = strtolower(pathinfo($name,PATHINFO_EXTENSION));

if ($error) {
    FLUSH::message('error', 'Something is wrong in uploading image.');
    HTTP::redirect("/admin/package/add.php");
}

if ($imageFileType === "jpeg" or $imageFileType === 'jpg' or $imageFileType === "png") {

    $file_name = uniqid() . '.' .  $imageFileType;
    move_uploaded_file($tmp, "../../photos/packages/" . $file_name);

    $data['image'] = $file_name;

    $package->insert($data);

    FLUSH::message('success', 'Package added successfully.');
    HTTP::redirect("/admin/package/index.php");
} else {
    FLUSH::message('error', 'Only JPG and PNG files are allowed.');
    HTTP::redirect("/admin/package/add.php");
}
