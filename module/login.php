<?php 
// sprawdzam czy dane sa poprawne jesli tak to przenies mnie do 
session_start();
require_once('../db.php');
class Login extends DataBase{
    private function sanitize_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
  }
    private $errors;
    private function check_user_data($data){
        $this->errors = array();
        $login = $this->sanitize_input($data['login']);
        $password = $this->sanitize_input($data['password']);
        if(!strlen($login)){
            array_push($this->errors, "Login lub email jest wymagany.");
        }
        if(!strlen($password)){
            array_push($this->errors, "Hasło jest wymagane.");
        }
        if(count($this->errors) == 0){
            return true;
        } else {
            return false;
        }
    }
    public function login_user($user){
        if($this->check_user_data($user)){
            $login = $this->sanitize_input($user['login']);
            $password = hash('sha256',  $this->sanitize_input($user['password']));
            $query = $this->conn->prepare('SELECT COUNT(*) as usersCount, id FROM `user` WHERE (`login` = ? OR `mail` = ?) AND `password` = ?');
            $query->bind_param('sss',$login,$login,$password);
            $query->execute();
            $result = $query->get_result();
            $userCount = $result->fetch_assoc();
            $result->close();
            $query->close();
            if($userCount['usersCount'] > 0){
                $_SESSION['is_logged'] = true;
                $_SESSION['user_id'] = $userCount['id'];
                echo json_encode(array('errors'=> array(''), 'status' => 'redirect'));
            } else {
                array_push($this->errors, "Nieprawidłowa nazwa użytkownika/email lub hasło");
                echo json_encode(array('errors'=> $this->errors, 'status' => 'error'));  
            }
            } else{
                echo json_encode(array('errors'=> $this->errors, 'status' => 'error')); 
        }
    }
};
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_data = array(
        "login" => $_POST['login'],
        "password" => $_POST['password'],
    );
    $user = new Login;
    $user->login_user($user_data);
    

}