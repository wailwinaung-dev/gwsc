<?php
    session_start();
    include("../../helpers/FLUSH.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GWSC</title>

        <!-- Montserrat Font -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="/gwsc/asset/css/login.css">
</head>
<body>
    <div class="container">
        <form class=" m-auto position-absolute top-0 bottom-0 w-50" style="left: 0;right: 0;top:0;bottom:0; height: 200px;" action="../../actions/admin/auth/Login.php" method='post'>

            <?php if(FLUSH::check('error')): ?>
                <div class="alert alert-warning">
                    <?= FLUSH::message('error') ?>
                </div>
            <?php endif; ?>
            
            <h3>
                <span class="material-icons-outlined">festival</span>
                <br/>
                <br/>
                GWSC
            </h3>
            
            <label class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="Email" name="email"/>

            <label class="form-label">Password</label>
            <input type="password" class="form-control" placeholder="Password" name="password" />

            <button class="btn btn-primary w-100 " type="submit" role="button" style="box-sizing: border-box;">Login</button>

        </form>
    </div>
</body>
</html>

