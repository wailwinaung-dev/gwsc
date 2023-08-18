<?php
include_once( __DIR__ . '/../MySql.php');



class PitchTypesTable extends MySQL
{
    private $db = null;
    public function __construct()
    {
        $this->db = $this->connect();
    }

    public function getAll()
    {   
        try {
            $query = "SELECT * FROM pitch_types";
            $result = $this->db->query($query);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function insert($data)
    {

        try {

            $sql = "INSERT INTO pitch_types (
                name, created_at, updated_at
            ) VALUES (
                ?, NOW(), NOW()
            )";

            $stmt = $this->db->prepare($sql);
            $stmt->bind_param(
                "s",
                $data['name'],
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
            $sql = "SELECT * FROM pitch_types WHERE id = '" . $id . "'";
            $result = $this->db->query($sql);
            
            return $result->fetch_assoc();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        
    }
}
