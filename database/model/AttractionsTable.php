<?php
include_once( __DIR__ . '/../MySql.php');



class AttractionsTable extends MySQL
{
    private $db = null;
    public function __construct()
    {
        $this->db = $this->connect();
    }

    public function getAll()
    {   
        try {
            $query = "SELECT * FROM attractions";
            $result = $this->db->query($query);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function insert($data)
    {

        try {

            $sql = "INSERT INTO attractions (
                name, description, location, image
            ) VALUES (
                ?,?,?,?
            )"; // sql

            $stmt = $this->db->prepare($sql); // prepare
            $stmt->bind_param(
                "ssss",
                $data['name'],
                $data['description'],
                $data['location'],
                $data['image'],
            );
            $stmt->execute(); // execute with data! 

            return $this->db->insert_id;
        } catch (PDOException $e) {
            return $e->getMessage()();
        }
    }

    public function update($data){
        $sql = "UPDATE attractions
            SET name = ?, description = ?, image = ?, location = ?
            WHERE id = ?";

        // Prepare and execute the query
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param(
            "ssssi",
            $data['name'],
            $data['description'],
            $data['image'],
            $data['location'],
            $data['id']
        );

        $stmt->execute();
    }

    public function delete($id){
        // Delete from package_attraction table
        $stmt = $this->db->prepare("DELETE FROM attractions WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function findById($id)
    {
        try {
            $sql = "SELECT a.*, COUNT(p.name) AS package_count
            FROM attractions a
            LEFT JOIN package_attraction pa ON pa.attraction_id = a.id 
            LEFT JOIN packages p ON p.id = pa.package_id
            WHERE a.id = ?
            GROUP BY a.id
            ";
           $stmt = $this->db->prepare($sql);
           $stmt->bind_param("i", $id);
           $stmt->execute();
           $result = $stmt->get_result();
            
            return $result->fetch_assoc();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        
    }
}
