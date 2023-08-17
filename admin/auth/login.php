<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Admin Login</title>
</head>
<body class="" style="height:100svh;">
    <form class=" m-auto position-absolute top-0 bottom-0 w-50" style="left: 0;right: 0;top:0;bottom:0; height: 200px;" action="/actions/admin/auth/Login.php" method='post'>
        <div class="mb-1 text-center h3">
            Login   
        </div>
        <hr class="w-25 bg-primary my-1 mx-auto"></hr>
        <div class="m-2">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="Email" name="email"/>
        </div>
        <div class="m-2">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" placeholder="Password" name="password" />
        </div>
        <div class="mx-auto w-100 px-2 mt-2">
            <button class="btn btn-primary w-100 " type="submit" role="button" style="box-sizing: border-box;">Login</button>
        </div>
    </form>
</body>
</html>