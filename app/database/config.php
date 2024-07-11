<?php
class config{
    private $servername="localhost";
    private $username="root";
    private $password="";
    private $database="Grad-Project";
    private $conn;
 public function __construct()
 {
    $this->conn= new mysqli($this->servername,$this->username,$this->password,$this->database);
 }
 public function runDML(string $query) : bool
 { //output is true or false
    $result=$this->conn->query($query);
    if($result){
        return true;
    }
    return false;
 }
 public function runDQL(string $query)  //select output is an array
 {
    $result=$this->conn->query($query);
    if($result->num_rows>0){//without num_rows>0 condition,  result would be always not empty
        return $result;
    }
    return [];
 }
}


?>