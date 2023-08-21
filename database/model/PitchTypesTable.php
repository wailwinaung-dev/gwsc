<?php
include_once(__DIR__ . '/../MySql.php');



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
            $query = "SELECT pt.*, COUNT(p.name) AS package_count
            FROM pitch_types pt 
            LEFT JOIN packages p 
            ON p.pitch_type_id = pt.id 
            GROUP BY pt.id 
            ORDER BY pt.id DESC";

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

    public function update($data)
    {
        $sql = "UPDATE pitch_types
            SET name = ?, updated_at = NOW()
            WHERE id = ?";

        // Prepare and execute the query
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param(
            "si",
            $data['name'],
            $data['id']
        );

        $stmt->execute();
    }

    public function delete($id)
    {
        // Delete from package_attraction table
        $stmt = $this->db->prepare("DELETE FROM pitch_types WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function findById($id)
    {
        try {
            $query = "SELECT pt.*, COUNT(p.name) AS package_count
            FROM pitch_types pt
            LEFT JOIN packages p ON p.pitch_type_id = pt.id
            WHERE pt.id = ?
            GROUP BY pt.id
            ORDER BY pt.id DESC";

            $stmt = $this->db->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();

            $result = $stmt->get_result();

            return $result->fetch_assoc();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
