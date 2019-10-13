<?php

class DataBase{
     private $data = array(
         "host" => "localhost",
         "username" => "root",
         "password" => "",
         "dbname" => "4bt_czainski_projekt"
     );
    protected $conn;
    
    public function __construct(){
        try{
        $this->conn = new mysqli($this->data['host'], $this->data['username'], $this->data['password'], $this->data['dbname']);
        }
        catch(Exception $e){
        echo "Error connection";
        }
    }
    
};