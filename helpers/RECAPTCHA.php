<?php

class RECAPTCHA
{

    static function check()
    {
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
        return json_decode($response);
    }
}
