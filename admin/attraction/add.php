<?php

include("../../helpers/AUTH.php");

Auth::check();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
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
        <h1 class="h3 mb-3">Add New Attraction</h1>
        <?php if (isset($_GET['incorrect'])) : ?>
            <div class="alert alert-warning">
                Incorrect Email or Password
            </div>
        <?php endif ?>
        <form action="../../actions/admin/attraction/create.php" method="post" enctype="multipart/form-data">
            <input type="type" name="name" class="form-control mb-2" placeholder="Enter Name" required>
            <textarea class="form-control mb-2" name="description" rows="3" placeholder="Enter Description"></textarea>
            <input type="type" name="location" class="form-control mb-2" placeholder="Enter Location" required>
            <input type="file" class="form-control-file mb-2" name="image" accept="image/*">
            <button type="submit" class="w-100 btn btn-lg btn-primary">
                Submit
            </button>
        </form>
        <br>
        <a href="index.php">Back</a>
    </div>
</body>

</html>``