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
            $query = "SELECT * FROM features ORDER BY id DESC";
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

    public function update($data){
        $sql = "UPDATE features
            SET name = ?, description = ?, image = ?
            WHERE id = ?";

        // Prepare and execute the query
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param(
            "sssi",
            $data['name'],
            $data['description'],
            $data['image'],
            $data['id']
        );

        $stmt->execute();
    }

    public function delete($id){
        // Delete from package_attraction table
        $stmt = $this->db->prepare("DELETE FROM features WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function findById($id)
    {
        try {
            $sql = "SELECT f.*, COUNT(p.name) AS package_count
            FROM features f
            LEFT JOIN package_feature pf ON pf.feature_id = f.id 
            LEFT JOIN packages p ON p.id = pf.package_id
            WHERE f.id = ?
            GROUP BY f.id
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
