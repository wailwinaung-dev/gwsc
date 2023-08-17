<?php
    session_start();
    include("./helpers/FLUSH.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .wrap {
            width: 100%;
            max-width: 400px;
            margin: 40px auto;
        }
    </style>
</head>

<body class="text-center">
    <div class="wrap">
        <h1 class="h3 mb-3">Register</h1>
        <?php if (isset($_GET['error'])) : ?>
            <div class="alert alert-warning">
                Cannot create account. Please try again.
            </div>
        <?php endif ?>
        <?php if (FLUSH::check('error')) : ?>
            <div class="alert alert-warning">
                <?php echo FLUSH::message('error'); ?>
            </div>
        <?php endif ?>
        <form action="actions/create_customer.php" method="post">
            <input type="text" name="first_name" class="form-control mb-2" placeholder="First Name" required>
            <input type="text" name="sur_name" class="form-control mb-2" placeholder="Sur Name" required>
            <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
            <input type="text" name="phone" class="form-control mb-2" placeholder="Phone" required>
            <textarea name="address" class="form-control mb-2" placeholder="Address" required></textarea>
            <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
            <button type="submit" class="w-100 btn btn-lg btn-primary">
                Register
            </button>
        </form>
        <br>
        <a href="index.php">Login</a>
    </div>
</body>

</html>