<?php
session_start();
include("./helpers/FLUSH.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include(__DIR__ . '/layout/header-link.php') ?>
    <link rel='stylesheet' href='/gwsc/asset/css/login-user.css' />
    <link rel='stylesheet' href='/gwsc/asset/css/common.css' />
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
</head>

<body class="text-center">
    <?php include(__DIR__ . '/layout/navbar.php') ?>
    <div class="wrap">
        <div class='column-1'>
            <div class='main-login'>
                <h1 class="h3 mb-3">
                    <div class='banner'>
                        <img src="/gwsc/asset/images/logo.png" class="banner" />
                    </div>
                    Login
                </h1>
                <?php if (FLUSH::check('error')): ?>
                    <div class="alert alert-danger">
                        <?= FLUSH::message('error') ?>
                    </div>
                <?php endif; ?>
                <form action="actions/login.php" method="post" id="login-form">
                    <label class='label'>Email</label>
                    <input type="email" name="email" class="control mb-2" placeholder="Email" required>
                    <label class='label'>Password</label>
                    <input type="password" name="password" class="control mb-2" placeholder="Password" required>
                    <div id="recaptcha" class="g-recaptcha" data-sitekey="6LcsbkgoAAAAAJ3FTsnTAbRWS9alde_tJ1yHHAbG"
                        data-size="100%"></div>
                    <br />
                    <button type="submit" class="w-100 btn btn-lg btn-primary">
                        Login
                    </button>
                </form>
                <br>
                <div style="text-align: center;">Don't have an account yet? <a href="register.php">Register</a></div>
            </div>
        </div>
    </div>

    <script>
        <?php if(isset($_SESSION['PMT_MSG'])) : ?>
            window.alert("<?= $_SESSION["PMT_MSG"] ?>");
        <?php endif ?>
    </script>
</body>

</html>