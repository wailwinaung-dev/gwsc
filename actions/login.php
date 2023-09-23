<?php
session_start();

include("../database/model/CustomersTable.php");
include("../helpers/HTTP.php");
include("../helpers/FLUSH.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $recaptchaSecretKey = "6LcsbkgoAAAAADfa0nlSVsh66b-2UnaDwPY8XUuF";
    $recaptchaResponse = $_POST["g-recaptcha-response"];
    
    $verifyUrl = "https://www.google.com/recaptcha/api/siteverify";
    $verifyData = http_build_query([
        "secret" => $recaptchaSecretKey,
        "response" => $recaptchaResponse,
        "remoteip" => $_SERVER["REMOTE_ADDR"]
    ]);
    
    $options = [
        "http" => [
            "header" => "Content-Type: application/x-www-form-urlencoded\r\n",
            "method" => "POST",
            "content" => $verifyData
        ]
    ];
    
    $context = stream_context_create($options);
    $response = file_get_contents($verifyUrl, false, $context);
    $responseData = json_decode($response);
    
    if ($responseData->success) {
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $table = new CustomersTable();
        $customer = $table->findByEmailAndPasword($email, $password);

        if ($customer) {
            $_SESSION['customer'] = $customer;
            HTTP::redirect("/home.php");
        } else {
            FLUSH::message('error', 'Email or Password is incorrect.');
            HTTP::redirect("/login.php");
        }

    } else {
        FLUSH::message('error', 'Please check the captcha form.');
        HTTP::redirect("/login.php");
    }
}
