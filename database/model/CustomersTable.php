<?php
include("../MySql.php");

class CustomersTable
{
    private $db = null;
    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
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
            
            return $result->fetch_assoc();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        
    }
}

// $table = new UsersTable(new MySQL());
// $result = $table->getAll();
// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//       echo "id: " . $row["id"]. " - Name: " . $row["first_name"]. " " . $row["sur_name"]. "<br>";
//     }
// } else {
//     echo "0 results";
// }