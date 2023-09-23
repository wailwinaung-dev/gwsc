<?php

include_once(__DIR__ . '/helpers/AUTH.php');
include_once(__DIR__ . '/database/model/BookingsTable.php');

Auth::check();
$bookingsTable = new BookingsTable();
$bookings = $bookingsTable->getAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <?php include(__DIR__ . '/layout/header-link.php') ?>
    <link rel="stylesheet" href="./asset/css/profile.css">
</head>

<body>
    <?php include(__DIR__ . '/layout/navbar.php') ?>
    <div class="container">
        <div class="profile">
            <h1>User Profile</h1>
            <div class="profile-info">
                <div class="profile-picture">
                    <i class="fa fa-user-circle-o"></i>
                </div>
                <div class="user-details">
                    <h2><?= $_SESSION['customer']['first_name'] . ' ' . $_SESSION['customer']['sur_name'] ?></h2>
                    <p>Phone: <?= $_SESSION['customer']['phone'] ?></p>
                    <p>Email: <?= $_SESSION['customer']['email'] ?></p>
                    <p>Address: <?= $_SESSION['customer']['address'] ?></p>

                </div>
            </div>
        </div>
        <hr>
        <h1>Booking List</h1>
        <?php foreach ($bookings as $key => $booking) : ?>
            <div class="booking">
                <h3>
                    <span>#<?= $key + 1 ?> <?= $booking['package_name'] ?></span>
                    <span>Booking Date: July 15, 2023</span>
                </h3>
                <p class="price">Total Price: $<?= $booking['subtotal'] ?></p>
                <p class="quantity">Quantity: 3</p>
            </div>
        <?php endforeach; ?>
    </div>

    <?php include(__DIR__ . '/layout/footer.php') ?>
</body>

</html>