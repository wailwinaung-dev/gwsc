<?php
session_start();
include('./helpers/FLUSH.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <?php include(__DIR__ . '/layout/header-link.php') ?>
    <link rel="stylesheet" href="./asset/css/contact.css" />
    <link rel="stylesheet" href="./asset/css/common.css" />
</head>

<body>
    <header>
        <?php include(__DIR__ . '/layout/navbar.php') ?>
    </header>
    <div class="hero-image">
        <div class="hero-text">
            <h1 style="font-size:50px">Contact Us</h1>
        </div>
    </div>

    <form class="contact-container" method="post" action="/gwsc/actions/contact.php">
        <?php if (FLUSH::check('success')) : ?>
            <div class="alert alert-success">
                <?= FLUSH::message('success') ?>
            </div>
        <?php endif ?>
        <div class="name-container">
            <div class="first-name">
                <label class="label">First Name</label>
                <input type="text" name="first_name" class="control" placeholder="First Name"  required/>
            </div>
            <div class="last-name">
                <label class="label">Last Name</label>
                <input type="text" name="last_name" class="control" placeholder="Last Name"  required/>
            </div>
        </div>
        <div class="">
            <label class="label">Email</label>
            <input type="email" name="email" class="control" placeholder="Email"  required/>
        </div>
        <div class="">
            <label class="label">Message</label>
            <textarea type="text" name="message" class="control" placeholder="Message" required></textarea>
        </div>
        <div>
            <input type="checkbox" name="check" required/>
            You accecpt <a href="/gwsc/privacy.php" alt="privacy" title="privacy">Privacy and Policy.</a>
        </div>
        <div class="">
            <button type="submit" class="button" value="register"> Submit </button>
        </div>
    </form>

    <?php include(__DIR__ . '/layout/footer.php') ?>
</body>

</html>