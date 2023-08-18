<?php
include_once( __DIR__ . '/../MySql.php');



class CampsitesTable extends MySQL
{
    private $db = null;
    public function __construct()
    {
        $this->db = $this->connect();
    }

    public function getAll()
    {   
        try {
            $query = "SELECT * FROM campsites";
            $result = $this->db->query($query);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function insert($data)
    {

        try {

            $sql = "INSERT INTO campsites (
                name, location, created_at, updated_at
            ) VALUES (
                ?, ?, NOW(), NOW()
            )";

            $stmt = $this->db->prepare($sql);
            $stmt->bind_param(
                "ss",
                $data['name'],
                $data['location'],
            );
            $stmt->execute();

            return $this->db->insert_id;
        } catch (PDOException $e) {
            return $e->getMessage()();
        }
    }

    public function findById($id)
    {
        try {
            $sql = "SELECT * FROM campsites WHERE id = '" . $id . "'";
            $result = $this->db->query($sql);
            
            return $result->fetch_assoc();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        
    }
}
