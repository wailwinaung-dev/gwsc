<?php
include_once( __DIR__ . '/../MySql.php');



Class FeaturesTable extends MySQL
{
    private $db = null;
    public function __construct()
    {
        $this->db = $this->connect();
    }

    public function getAll()
    {   
        try {
            $query = "SELECT * FROM features";
            $result = $this->db->query($query);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function insert($data)
    {

        try {

            $sql = "INSERT INTO features (
                name, description, image
            ) VALUES (
                ?,?,?
            )"; // sql

            $stmt = $this->db->prepare($sql); // prepare
            $stmt->bind_param(
                "sss",
                $data['name'],
                $data['description'],
                $data['image'],
            );
            $stmt->execute(); // execute with data! 

            return $this->db->insert_id;
        } catch (PDOException $e) {
            return $e->getMessage()();
        }
    }

    public function findById($id)
    {
        try {
            $sql = "SELECT * FROM features WHERE id = '" . $id . "'";
            $result = $this->db->query($sql);
            
            return $result->fetch_assoc();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        
    }
}
