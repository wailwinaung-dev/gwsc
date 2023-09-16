<?php
include_once(__DIR__ . '/../MySql.php');


class ReviewsTable extends MySQL
{
    private $db = null;
    public function __construct()
    {
        $this->db = $this->connect();
    }

    public function getAll()
    {
        try {
            $query = "SELECT 
            reviews.*, 
            packages.name AS package_name,
            CONCAT(customers.first_name, ' ', customers.sur_name) AS customer_name
            FROM reviews 
            LEFT JOIN packages ON packages.id = reviews.package_id
            LEFT JOIN customers ON customers.id = reviews.customer_id
            ORDER BY id DESC";

            $result = $this->db->query($query);
            $data = $result->fetch_all(MYSQLI_ASSOC);

            return $data;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function insert($data)
    {   
        try {

            $sql = "INSERT INTO reviews (
                customer_id, package_id, message, rating, created_at, updated_at
            ) VALUES (
                ?, ?, ?, ?, NOW(), NOW()
            )";

            $stmt = $this->db->prepare($sql);
            $stmt->bind_param(
                "iisi",
                $_SESSION['customer']['id'],
                $data['package_id'],
                $data['message'],
                $data['rating'],
            );
            $stmt->execute();

            return $this->db->insert_id;
        } catch (PDOException $e) {
            return $e->getMessage()();
        }
    }
}