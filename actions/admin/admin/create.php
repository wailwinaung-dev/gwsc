<?php
session_start();

include("../../../database/model/AdminsTable.php");
include("../../../helpers/HTTP.php");
include("../../../helpers/FLUSH.php");

$data = $_POST;

$admin = new AdminsTable();

if( $admin) {
    //check email if exist or not
    if( $admin->findByEmail($data['email']) > 0 ){
        FLUSH::message('error', 'Email is already exits.');
        HTTP::redirect("/admin/admin/add.php");
    }

    $admin->insert($data);
    FLUSH::message('success', 'Admin added successfully.');
    HTTP::redirect("/admin/admin/index.php");
} else {
    FLUSH::message('error', 'Something is going wrong.');
    HTTP::redirect("/admin/admin/add.php");
}
