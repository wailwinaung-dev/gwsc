<?php
session_start();

include("../../../database/model/PackagesTable.php");
include("../../../helpers/HTTP.php");
include("../../../helpers/FLUSH.php");

$data = $_POST;
$packagesTable = new PackagesTable();
$package = $packagesTable->findById($data['id']);

$name = $_FILES['image']['name'];
$error = $_FILES['image']['error'];
$tmp = $_FILES['image']['tmp_name'];
$imageFileType = strtolower(pathinfo($name,PATHINFO_EXTENSION));

$allowType = ['jpeg', 'jpg', 'png'];


if($name == '' && $tmp == ''){
    $data['image'] = $package['image'];
}else {

    //if user not change package image
    if (!in_array($imageFileType, $allowType)) {
        FLUSH::message('error', 'Only JPG and PNG files are allowed.');
        HTTP::redirect("/admin/package/edit.php?id=" . $data['id']);
    }

    $file_name = uniqid() . '.' .  $imageFileType;
    move_uploaded_file($tmp, "../../photos/packages/" . $file_name);

    $data['image'] = $file_name;
}
// var_dump($data);exit;
$packagesTable->update($data);

FLUSH::message('success', 'Package updated successfully.');
HTTP::redirect("/admin/package/index.php");
