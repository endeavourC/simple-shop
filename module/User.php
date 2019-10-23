<?php
require_once('db.php');
class User extends DataBase {
      public function get_permission($id){
        $query = $this->conn->prepare('SELECT type_account FROM user WHERE id = ?');
        $query -> bind_param('d', $id);
        $query -> execute();
        $result = $query -> get_result();
        $results = $result -> fetch_assoc();
        $result -> close();
        $query -> close();
        return $results;
    }
    
}