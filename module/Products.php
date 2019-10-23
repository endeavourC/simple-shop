<?php
require_once('db.php');
class Products extends DataBase {
    public function get_all_products(){
        $query = $this->conn->prepare('SELECT id, name , description, price, id_category, src_img, alt_img FROM product');
        $query->execute();
        $result = $query -> get_result();
        $results = array();
        while($row = $result -> fetch_assoc()){
            array_push($results, $row);
        }
        $result->close();
        $query->close();
        return $results;
    }
    public function get_category_name($cat_id){
        $query = $this->conn->prepare('SELECT name FROM category WHERE id = ?');
        $query->bind_param('d', $cat_id);
        $query->execute();
        $result = $query -> get_result();
        $results = $result -> fetch_assoc();
        $result->close();
        $query->close();
        return $results['name'];        
    }
    public function get_all_categories(){
        $query = $this->conn->prepare('SELECT id, name FROM category');
        $query->execute();
        $result = $query -> get_result();
        $results = array();
        while($row = $result -> fetch_assoc()){
            array_push($results, $row);
        }
        $result->close();
        $query->close();
        return $results;
    }
    public function get_product_in_category($cat_name){
        $query = $this->conn->prepare('SELECT id FROM category WHERE name = ?');
        $query->bind_param('s', $cat_name);
        $query->execute();
        $result = $query -> get_result();
        $results = $result->fetch_assoc();
        $result->close();
        $query->close();
        $cat_id = $results['id'];
        $query_two = $this->conn->prepare('SELECT id, name , description, price, id_category, src_img, alt_img FROM product where id_category = ?');
        $query_two->bind_param('d', $cat_id);
        $query_two->execute();
        $row = array();
        $result_two = $query_two -> get_result();
        $results_two = array();
        while($row = $result_two -> fetch_assoc()){
            array_push($results_two, $row);
        }
        $result_two->close();
        $query_two->close();
        return $results_two;

    }
}