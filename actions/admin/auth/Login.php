<?php
    session_start();
    
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

        $admin['is_admin'] = true;
        $_SESSION['user'] = $admin;

        HTTP::redirect("/admin/dashboard.php");
    } else {
        FLUSH::message('error', 'Email or Password is incorrect.');
        HTTP::redirect("/admin/auth/login.php");
    }
?>