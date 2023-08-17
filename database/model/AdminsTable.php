<?php
// include("../MySql.php");

// class UsersTable
// {
//     private $db = null;
//     public function __construct()
//     {
//         $this->db = $db->connect();
//     }

//     public function getAll()
//     {
//         try {
//             $query = "SELECT * FROM admins";
//             return $this->db->query($query);;
//         } catch (Exception $e) {
//             throw new Exception($e->getMessage());
//         }
//     }

// }

// $table = new UsersTable();
// $result = $table->getAll();
// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//       echo "id: " . $row["id"]. " - Name: " . $row["first_name"]. " " . $row["sur_name"]. "<br>";
//     }
// } else {
//     echo "0 results";
// }