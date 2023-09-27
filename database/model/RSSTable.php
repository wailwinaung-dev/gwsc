<?php
include_once(__DIR__ . "/../MySql.php");

class RSSTable extends MySQL
{

    private $db;
    public function __construct()
    {
        $this->db = $this->connect();
    }

    public function getAll()
    {
        try {
            $query = "SELECT * FROM rss_table";
            $result = $this->db->query($query);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}