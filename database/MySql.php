<?php

class MySQL
{
    public function connect()
    {
        try {
            return new mysqli('localhost','root','','gwsc');
        }
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }
}
