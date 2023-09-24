<?php
session_start();

include("../database/model/CustomersTable.php");
include("../helpers/HTTP.php");
include("../helpers/FLUSH.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $timeout = false;
    $locked = false;
    if (isset($_SESSION["FDT"])) {
        $sampleTimeStamp = $_SESSION["FDT"];
        $attempt = $sampleTimeStamp["attempt"];
        if ($attempt > 3) {
            $dateTime = $sampleTimeStamp["dateTime"];
            if ($dateTime != null) {
                $current = new DateTime();
                if ($current < $dateTime) {
                    $locked = true;
                    $_SESSION["PMT_MSG"] = "You will lock for 10 minutes because you failed the userName and password three times.";
                }
            } else {
                var_dump("locked not true");
                $timeout = true;
                $_SESSION["PMT_MSG"] = "";
            }
        }
    }
    if (!$locked) {
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


            if ($customer != null) {
                $_SESSION['customer'] = $customer;
                $customer['view_count'] = $customer['view_count'] + 1;

                //increate view count
                $table->increaseViewCount($customer['id'], $customer['view_count']);
                unset($_SESSION['FDT']);
                unset($_SESSION['PMT_MSG']);
                HTTP::redirect("/home.php");
            } else {
                if (!isset($_SESSION["FDT"])) {
                    $_SESSION['FDT'] = [
                        "attempt" => 1,
                        "dateTime" => null
                    ];
                } else {
                    $trials = $_SESSION['FDT'];
                    if ($trials != null) {
                        if ($timeout) {
                            $trials['attempt'] = 0;
                        }
                        if($trials['$attempt']<=3)
                            $trials['attempt']++;
                        if ($trials['attempt'] == 3) {
                            $temp = new DateTime();
                            $temp->add(new DateInterval("PT10M"));
                            $trials['dateTime'] = $temp;
                            $_SESSION['PMT_MSG'] = "You are logged in for three times with worng email and password.";
                        }
                        $_SESSION["FDT"] = $trials;
                    }
                }
                FLUSH::message('error', 'Email or Password is incorrect.');
                HTTP::redirect("/login.php");
            }

        } else {
            FLUSH::message('error', 'Please check the captcha form.');
            HTTP::redirect("/login.php");
        }
    }else{
        HTTP::redirect("/login.php");
    }
}