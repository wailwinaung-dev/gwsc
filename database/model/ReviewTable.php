<?php
include_once(__DIR__."/../MySql.php");

class AdminsTable extends MySQL
{
    private mysqli $db;
    public function __construct()
    {
        $this->db = $this->connect();
    }

    public function getAll(string $package_id)
    {
        try {
            $query = "SELECT * FROM reviews WHERE package_id=?";
            $statement=$this->db->prepare($query);
            $statement->bind_param("s",$package_id);
            $statement->execute();

            $result=$statement->get_result();

            return $result->fetch_assoc();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function insert($data)
    {

        try {
            // var_dump($data);exit;

            $sql = "INSERT INTO reviews (
                customer_id,package_id,message,rating,created_at,updated_at
            ) VALUES (
                ?,?,?,?,NOW(), NOW()
            )"; // sql

            $stmt = $this->db->prepare($sql); // prepare
            $stmt->bind_param(
                "ssss",
                $data['customer_id'],
                $data['package_id'],
                $data['message'],
                $data['rating']
            );
            $stmt->execute(); // execute with data! 

            return $this->db->insert_id;
        } catch (mysqli_sql_exception $e) {
            return $e->getMessage()();
        }
    }

    public function update($data)
    {
        $sql = "UPDATE admins
            SET first_name = ?, sur_name = ?, email = ?, phone = ?, position = ?, address = ?
            WHERE id = ?";

        // Prepare and execute the query
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param(
            "ssssssi",
            $data['first_name'],
            $data['sur_name'],
            $data['email'],
            $data['phone'],
            $data['position'],
            $data['address'],
            $data['id']
        );

        $stmt->execute();
    }

    public function delete($id)
    {

        $stmt = $this->db->prepare("DELETE FROM admins WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    }

    
    public function findUserByEmailAndPassword(string $email, string $password)
    {
        try{
            $query="SELECT * FROM admins ";
            $query.=" WHERE email=? and password = ? LIMIT 1;";

            $stmt=$this->db->prepare($query);

            $stmt->bind_param("ss",$email,$password);

            $stmt->execute();

            $rs=$stmt->get_result();
            
            $result=$rs->fetch_assoc();

            return $result;
        }catch(Exception $e){

        }
    }

    public function findByEmail($email)
    {
        try {
            $sql = "SELECT COUNT(email) FROM admins WHERE email = '" . $email . "'";
            $result = $this->db->query($sql);

            return $result->fetch_column();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function findById($id)
    {
        try {
            $sql = "SELECT * FROM admins WHERE id = '" . $id . "'";
            $result = $this->db->query($sql);

            return $result->fetch_assoc();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}