<?php
include_once(__DIR__ . '/../MySql.php');



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
            $query = "SELECT * FROM campsites ORDER By id DESC";
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

    public function update($data)
    {
        $stmt = $this->db->prepare("UPDATE campsites SET name = ?, location = ?, updated_at = NOW() WHERE id = ?");
        $stmt->bind_param('ssi', $data['name'], $data['location'], $data['id']);
        if($stmt->execute()){
            return true;
        }else{
            echo "faild to update";exit;
        }
        $stmt->close();
    }

    public function delete($id)
    {
        // Delete from package_attraction table
        $stmt = $this->db->prepare("DELETE FROM campsites WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function findById($id)
    {
        try {
            $sql = "SELECT c.*, COUNT(p.name) AS package_count
            FROM campsites c
            LEFT JOIN packages p ON p.campsite_id = c.id
            WHERE c.id = ?
            GROUP BY c.id
            ORDER BY c.id DESC";

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
