<?php
include_once(__DIR__ . '/../MySql.php');



class ContactsTable extends MySQL
{
    private $db = null;
    public function __construct()
    {
        $this->db = $this->connect();
    }

    public function getCount(){
        try {
            $sql = "SELECT COUNT(id) FROM contacts";
            $result = $this->db->query($sql);

            return $result->fetch_column();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getAll()
    {
        try {
            $query = "SELECT * FROM contacts ORDER BY id DESC";

            $result = $this->db->query($query);
            $data = $result->fetch_all(MYSQLI_ASSOC);

            return $data;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

}
