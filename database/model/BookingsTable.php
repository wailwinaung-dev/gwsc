<?php
include_once(__DIR__ . '/../MySql.php');



class BookingsTable extends MySQL
{
    private $db = null;
    public function __construct()
    {
        $this->db = $this->connect();
    }

    public function getCount(){
        try {
            $sql = "SELECT COUNT(id) FROM bookings";
            $result = $this->db->query($sql);

            return $result->fetch_column();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getAll()
    {
        try {
            $query = "SELECT 
                b.*, 
                CONCAT(c.first_name, ' ', c.sur_name) AS customer_name,
                p.name AS package_name
                
            FROM bookings b
                LEFT JOIN customers c ON c.id = b.customer_id
                LEFT JOIN packages p ON p.id = b.package_id

            ORDER BY b.id DESC";

            $result = $this->db->query($query);
            $data = $result->fetch_all(MYSQLI_ASSOC);

            return $data;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function statusHandler($id, $status)
    {

        try {
            $this->db->query("UPDATE bookings SET status='" . $status . "' WHERE id='" . $id . "'");

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function insert($data){
        try {
            // var_dump($data);exit;

            $sql = "INSERT INTO bookings (
                customer_id, package_id, qty, price, subtotal, booking_date, created_at, updated_at
            ) VALUES (
                ?,?,?,?,?,?,NOW(), NOW()
            )"; // sql

            $stmt = $this->db->prepare($sql); // prepare
            $stmt->bind_param(
                "iiiiis",
                $_SESSION['customer']['id'],
                $data['package_id'],
                $data['qty'],
                $data['price'],
                $data['subtotal'],
                $data['booking_date']
            );
            $stmt->execute(); // execute with data! 

            return $this->db->insert_id;
        } catch (PDOException $e) {
            return $e->getMessage()();
        }
    }

}
