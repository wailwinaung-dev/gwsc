<?php
session_start();
include("./helpers/FLUSH.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='/gwsc/asset/css/register-user.css' />
</head>

<body class="text-center">
    <div class="wrap">
        <div class='column-1'>
            <div class='main-login'>
                <h1 class="h3 mb-3">
                    <div class='banner'>
                        <img src="/gwsc/asset/images/loginPicture.jpg" class="banner" />
                    </div>
                    Register
                </h1>
                <?php if (FLUSH::check('error')): ?>
                    <div class="alert alert-warning">
                        <?= FLUSH::message('error') ?>
                    </div>
                <?php endif; ?>
                <form action="actions/login.php" method="post">
                    <label class='label'>First Name</label>
                    <input type="text" name="first_name" class="control mb-2" placeholder="First Name" required>
                    <label class='label'>Sur Name</label>
                    <input type="text" name="sur_name" class="control mb-2" placeholder="Sur Name" required>
                    <label class='label'>Email</label>
                    <input type="email" name="email" class="control mb-2" placeholder="Email" required>
                    <label class='label'>Phone Number</label>
                    <input type="text" name="phone" class="control mb-2" placeholder="Phone" required>
                    <label class='label'>Address</label>
                    <textarea name="address" class="control mb-2" placeholder="Address" required></textarea>
                    <label class='label'>Address</label>
                    <input type="password" name="password" class="control mb-2" placeholder="Password" required>
                    <button type="submit" class="w-100 btn btn-lg btn-primary">
                        Register
                    </button>
                </form>
                <br>
                <a href="register.php">Register</a>
            </div>
        </div>
    </div>
</body>

</html>