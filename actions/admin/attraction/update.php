<?php
session_start();

include("../../../database/model/AttractionsTable.php");
include("../../../helpers/HTTP.php");
include("../../../helpers/FLUSH.php");

$data = $_POST;
$attractionsTable = new AttractionsTable();
$attraction = $attractionsTable->findById($data['id']);

$name = $_FILES['image']['name'];
$error = $_FILES['image']['error'];
$tmp = $_FILES['image']['tmp_name'];
$imageFileType = strtolower(pathinfo($name,PATHINFO_EXTENSION));

$allowType = ['jpeg', 'jpg', 'png'];


if($name == '' && $tmp == ''){
    $data['image'] = $attraction['image'];
}else {

    //if user not change attraction image
    if (!in_array($imageFileType, $allowType)) {
        FLUSH::message('error', 'Only JPG and PNG files are allowed.');
        HTTP::redirect("/admin/attraction/edit.php?id=" . $data['id']);
    }

    $file_name = uniqid() . '.' .  $imageFileType;
    move_uploaded_file($tmp, "../../photos/attractions/" . $file_name);

    $data['image'] = $file_name;
}
// var_dump($data);exit;
$attractionsTable->update($data);

FLUSH::message('success', 'Attraction updated successfully.');
HTTP::redirect("/admin/attraction/index.php");
