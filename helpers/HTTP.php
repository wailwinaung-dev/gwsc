<?php

class HTTP
{
    static $base = "http://localhost/gwsc";

    static function redirect($path, $query = "")
    {
        $url = static::$base . $path;
        if($query) $url .= "?$query";

        header("location: $url");
        exit();
    }
}