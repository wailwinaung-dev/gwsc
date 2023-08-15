<?php

include("../MySql.php");

class Migration
{
    private $db = null;
    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }
    public function createAdminTable()
    {
        try {
            $query = "
            create table admins(
                id int(11) primary key auto_increment,
                first_name varchar(100) not null,
                sur_name varchar(100) not null,
                email varchar(255) not null,
                password varchar(255) not null,
                phone varchar(30) NOT NULL,
                address text not null,
                created_at datetime not null,
                updated_at datetime not null
            )";
            $result = $this->db->query($query);
            if($result){
                echo "Admin Table created successfully.";
            }else{
                echo "Admin Table failed to create.";
            }
        }catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    
    }
}

$table = new Migration(new MySQL());
$table->createAdminTable();