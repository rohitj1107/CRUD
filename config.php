<?php
class DB{
    public $host = "localhost"; // your host name
    public $username = "root"; // your user name
    public $password = ""; // your password
    public $db = "userinfo"; // your database name

    function create_db(){
        $conn = new mysqli($this->host, $this->username, $this->password);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "CREATE DATABASE $this->db";
        if ($conn->query($sql) === TRUE) {
            return "Database created successfully";
        } else {
             "Error creating database: " . $conn->error .'<br>';
        }
    }

    function create_table(){
        $conn = new mysqli($this->host, $this->username, $this->password, $this->db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
            $sql = "CREATE TABLE mUsers (
                    UserID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    Name VARCHAR(30) NOT NULL,
                    Email VARCHAR(225) NOT NULL,
                    Phone VARCHAR(50),
                    DOB VARCHAR(50),
                    Sex VARCHAR(50),
                    CreatedDate TIMESTAMP,
                    ModifiedDate TIMESTAMP
            )";

            if ($conn->query($sql) === TRUE) {
                return "Table mUsers created successfully";
            } else {
                 "Error creating table: " . $conn->error;
            }

    }

    function connect(){
        $conn = new mysqli($this->host, $this->username, $this->password, $this->db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }

}

$obj = new DB;
echo $obj->create_db();
echo $obj->create_table();


$connection = new mysqli($obj->host,$obj->username,$obj->password,$obj->db);
if (! $connection){
    die("Error in connection".$connection->connect_error);
}
