<?php
    var_dump($_SERVER["REQUEST_URI"]);
    die();
    include("../../../database/model/AdminsTable.php");
    include("../../../helpers/HTTP.php");
    include("../../../helpers/FLUSH.php");
    $data=[
        "email"=>$_POST['email'],
        "password"=> $_POST['password']
    ];
    $model = new AdminsTable();

    $admin=$model->findUserByEmailAndPassword($data['email'],$data['password']);

    if ($admin) {
        $_SESSION['user'] = $admin;
        HTTP::redirect("/home.php");
    } else {
        HTTP::redirect("/admin/auth/login.php");
    }
?>