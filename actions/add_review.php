<?php
session_start();

include("../database/model/ReviewsTable.php");
include("../helpers/HTTP.php");
include("../helpers/FLUSH.php");

$data = [
    "package_id" => $_POST['package_id'],
    "message" => $_POST['message'],
    "rating" => $_POST['rating'],
];

$review = new ReviewsTable();

$review->insert($data);

HTTP::redirect("/review.php");

