<?php
session_start();
include("./helpers/FLUSH.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='/gwsc/asset/css/login-user.css' />
    <link rel='stylesheet' href='/gwsc/asset/css/common.css' />
</head>

<body class="text-center">
    <div class="wrap">
        <div class='column-1'>
            <div class='main-login'>
                <h1 class="h3 mb-3">
                    <div class='banner'>
                        <img src="/gwsc/asset/images/logo.png" class="banner"/>
                    </div>
                    Login
                </h1>
                <?php if (FLUSH::check('error')): ?>
                    <div class="alert alert-warning">
                        <?= FLUSH::message('error') ?>
                    </div>
                <?php endif; ?>
                <form action="actions/login.php" method="post">
                    <label class='label'>Email</label>
                    <input type="email" name="email" class="control mb-2" placeholder="Email" required>
                    <label class='label'>Password</label>
                    <input type="password" name="password" class="control mb-2" placeholder="Password" required>
                    <button type="submit" class="w-100 btn btn-lg btn-primary">
                        Login
                    </button>
                </form>
                <br>
                <a href="register.php">Register</a>
            </div>
        </div>

    </div>
</body>

</html>