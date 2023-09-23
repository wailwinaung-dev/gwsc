<?php
include(__DIR__ . "/../../helpers/AUTH.php");
$auth = Auth::check();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Fav Icon  -->
    <link rel="apple-touch-icon" sizes="180x180" href="/gwsc/asset/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/gwsc/asset/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/gwsc/asset/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="/gwsc/asset/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="/gwsc/asset/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/gwsc/asset/css/styles.css">
</head>

<body>
    <div class="grid-container">