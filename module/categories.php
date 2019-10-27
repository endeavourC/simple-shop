<?php
require_once('../db.php');
session_start();

class Category extends DataBase {
    public function add_category($data){
        $query = $this->conn->prepare('INSERT INTO category(name) VALUES(?)');
        $query->bind_param('s' , $data['name']);
        $query->execute();
    }
    public function edit_category($data){
        $query = $this->conn->prepare('UPDATE category SET name = ? WHERE id = ? ');
        $query->bind_param('sd', $data['name'], $data['id']);
        $query->execute();
    }
      public function delete_category($data){
        $query = $this->conn->prepare('DELETE FROM category WHERE id = ?');
        $query->bind_param('d', $data['id']);
        $query->execute();
    }
};
if(isset($_POST)){
    $category = new Category;
    if(isset($_POST['add_category'])){
        $add = array(
            'name' => $_POST['add_category_name']
        );
        $category->add_category($add);
        header('Location: ../categories.php');
    }elseif(isset($_POST['edit_category'])){
        $edit = array(
          'id' => $_POST['edit_categories'],
            'name' => $_POST['edit_category_name']
        );    
        $category->edit_category($edit);
        header('Location: ../categories.php');
    } elseif(isset($_POST['delete_category'])){
        $delete = array(
            'id' => $_POST['delete_categories'],
        );    
        $category->delete_category($delete);
        header('Location: ../categories.php');
    }
};
