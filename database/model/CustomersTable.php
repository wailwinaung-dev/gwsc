<?php
include_once(__DIR__ . "/../MySql.php");

class CustomersTable extends MySQL
{
    private $db = null;
    public function __construct()
    {
        $this->db = $this->connect();
    }

    public function getCount(){
        try {
            $sql = "SELECT COUNT(id) FROM customers";
            $result = $this->db->query($sql);

            return $result->fetch_column();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getAll()
    {
        try {
            $query = "SELECT * FROM customers ORDER BY id DESC";
            $result = $this->db->query($query);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function insert($data)
    {

        try {
            // var_dump($data);exit;

            $sql = "INSERT INTO customers (
                first_name, sur_name, email, phone, address, password, created_at, updated_at
            ) VALUES (
                ?,?,?,?,?,?,NOW(), NOW()
            )"; // sql

            $stmt = $this->db->prepare($sql); // prepare
            $stmt->bind_param(
                "ssssss",
                $data['first_name'],
                $data['sur_name'],
                $data['email'],
                $data['phone'],
                $data['address'],
                $data['password']
            );
            $stmt->execute(); // execute with data! 

            return $this->db->insert_id;
        } catch (PDOException $e) {
            return $e->getMessage()();
        }
    }

    public function update($data)
    {
        $sql = "UPDATE customers
            SET first_name = ?, sur_name = ?, email = ?, phone = ?, address = ?
            WHERE id = ?";

        // Prepare and execute the query
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param(
            "sssssi",
            $data['first_name'],
            $data['sur_name'],
            $data['email'],
            $data['phone'],
            $data['address'],
            $data['id']
        );

        $stmt->execute();
    }

    public function delete($id)
    {
        // Delete from package_attraction table
        // Delete reviews first
        $stmtReviews = $this->db->prepare("DELETE FROM reviews WHERE customer_id = ?");
        $stmtReviews->bind_param('i', $id);
        $stmtReviews->execute();
        $stmtReviews->close();

        // Then delete the customer
        $stmtCustomer = $this->db->prepare("DELETE FROM customers WHERE id = ?");
        $stmtCustomer->bind_param('i', $id);
        $stmtCustomer->execute();
        $stmtCustomer->close();
    }

    public function findByEmailAndPasword($email, $password)
    {
        try {
            $sql = "SELECT * FROM customers WHERE email = '" . $email . "' AND password = '" . $password . "'";
            $result = $this->db->query($sql);

            $data = $result->fetch_assoc();

            return $data;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function findByEmail($email)
    {
        try {
            $sql = "SELECT COUNT(email) FROM customers WHERE email = '" . $email . "'";
            $result = $this->db->query($sql);

            return $result->fetch_column();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function findById($id)
    {
        try {
            $sql = "SELECT * FROM customers WHERE id = '" . $id . "'";
            $result = $this->db->query($sql);

            return $result->fetch_assoc();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
