<?php
session_start();

include("../../../database/model/FeaturesTable.php");
include("../../../helpers/HTTP.php");
include("../../../helpers/FLUSH.php");

$data = $_POST;
$featuresTable = new FeaturesTable();
$feature = $featuresTable->findById($data['id']);

$name = $_FILES['image']['name'];
$error = $_FILES['image']['error'];
$tmp = $_FILES['image']['tmp_name'];
$imageFileType = strtolower(pathinfo($name,PATHINFO_EXTENSION));

$allowType = ['jpeg', 'jpg', 'png'];


if($name == '' && $tmp == ''){
    $data['image'] = $feature['image'];
}else {

    //if user not change feature image
    if (!in_array($imageFileType, $allowType)) {
        FLUSH::message('error', 'Only JPG and PNG files are allowed.');
        HTTP::redirect("/admin/feature/edit.php?id=" . $data['id']);
    }

    $file_name = uniqid() . '.' .  $imageFileType;
    move_uploaded_file($tmp, "../../photos/features/" . $file_name);

    $data['image'] = $file_name;
}
// var_dump($data);exit;
$featuresTable->update($data);

FLUSH::message('success', 'Feature updated successfully.');
HTTP::redirect("/admin/feature/index.php");
