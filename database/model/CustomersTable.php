<?php
include(__DIR__ . "/../MySql.php");

class CustomersTable extends MySQL
{
    private $db = null;
    public function __construct()
    {
        $this->db = $this->connect();
    }

    public function getAll()
    {
        try {
            $query = "SELECT * FROM customers";
            return $this->db->query($query);;
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

    public function findByEmailAndPasword($email, $password)
    {
        try {
            $sql = "SELECT * FROM customers WHERE email = '" . $email . "' AND password = '" . $password . "'";
            $result = $this->db->query($sql);
            
            $data= $result->fetch_assoc();

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
}
