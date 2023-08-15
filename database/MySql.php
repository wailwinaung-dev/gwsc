<?php

class MySQL
{
    private $dbhost;
    private $dbuser;
    private $dbname;
    private $dbpass;
    private $db;
    public function __construct(
        $dbhost = "localhost",
        $dbuser = "root",
        $dbpass = "",
        $dbname = "gwsc",
    ) {
        $this->dbhost = $dbhost;
        $this->dbuser = $dbuser;
        $this->dbname = $dbname;
        $this->dbpass = $dbpass;
        $this->db = null;
    }
    public function connect()
    {
        try {
            $this->db = new mysqli($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
            // var_dump($this->db);
            return $this->db;
        }
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }
}
