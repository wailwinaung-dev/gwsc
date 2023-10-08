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
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
</head>

<body class="text-center" id="login">
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
                    <button type="submit" class="w-100 btn btn-lg btn-primary" id="submit">
                        Login
                    </button>
                </form>
                <br>
                <div style="text-align: center;">Don't have an account yet? <a href="register.php">Register</a></div>
            </div>
        </div>
    </div>
    <div id="timer"></div>

    <script>
        let login_time = <?= isset($_SESSION['login_fail']['time']) ? $_SESSION['login_fail']['time'] * 1000 : 0 ?>;

        function updateTimer() {
            var now = new Date().getTime();
            var timeout = login_time // Convert to milliseconds
            var timeRemaining = timeout - now;
            let submitBtn = document.getElementById('submit')
            if (timeRemaining <= 0) {
                submitBtn.innerHTML = "Submit";
                submitBtn.disabled = false;
                // You can also redirect the user to the login page here.
            } else {
                var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
                submitBtn.innerHTML = "Login failed 3 times. <b><i>" + minutes + "m " + seconds + "s<i></b>";
                submitBtn.disabled = true;
            }
        }

        // Update the timer every second
        if(login_time){
            setInterval(updateTimer, 1000);
        }
    </script>
</body>

</html>