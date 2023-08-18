<?php
include(__DIR__."/../MySql.php");

class AdminsTable extends MySQL
{
    private $db = null;
    public function __construct()
    {
        $this->db = $this->connect();
    }

    public function getAll()
    {
        try {
            $query = "SELECT * FROM admins";
            return $this->db->query($query);;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
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

}