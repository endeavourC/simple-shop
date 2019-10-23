<?php
require_once('../db.php');
class Register extends DataBase{
    private function sanitize_input($data){
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
    }
    private $errors;
    private function validate_user_data($data){
        $this->errors = array();
        if(!filter_var($data['register-email'], FILTER_VALIDATE_EMAIL)){
            array_push($this->errors, "Nieprawidłowy email");
        }
        if(!strlen($this->sanitize_input($data['register-login']))){
            array_push($this->errors, "Musisz podać login");
        }      
        if(!strlen($this->sanitize_input($data['register-password']))){
            array_push($this->errors, "Musisz podać hasło");
        }      
        if($data['register-type-account'] != "employer" && $data['register-type-account'] != "client"){
            array_push($this->errors, "Niepoprawny typ konta");
        }
        if($this->sanitize_input($data['repeat-register-password']) != $this->sanitize_input($data['register-password'])){
            array_push($this->errors, "Hasła muszą być identyczne");
        }
        if(count($this->errors) == 0){
            $condition = true;

        } else {
            $condition = false;

        }
        return $condition;
    }
    private function is_user_registered($login,$email){
        $query = $this->conn->prepare('SELECT COUNT(*) as usersCount FROM `user` WHERE `login` = ? OR `mail` = ?');
        $query->bind_param('ss', $login, $email);
        $query->execute();
        $result = $query->get_result();
        $userCount = $result->fetch_assoc();
        $result->close();
        $query->close();
        if($userCount['usersCount'] == 0){
            return false;
        } else {
            return true;
        }
        
    }
    public function registerUser($data){
                if($this->validate_user_data($data)){
                    $login = $this->sanitize_input($data['register-login']);
                    $email = $this->sanitize_input($data['register-email']);
                    $password = hash('sha256', $this->sanitize_input($data['register-password']));
                    $type_account = $this->sanitize_input($data['register-type-account']);
                    if(!$this->is_user_registered($login,$email)){
                        $query = $this->conn->prepare('INSERT INTO user (login, mail, password,type_account) VALUES (?, ?, ? ,?)');
                        $query->bind_param('ssss', $login, $email, $password, $type_account);
                        $query->execute();
                        echo json_encode(array_merge(array("msg"=> array("Zostałeś zarejestrowany pomyślnie! Możesz się teraz zalogować.")), array("status" => "ok")));
                        $query-> close();
                    } else {
                        array_push($this->errors, "Adres email/ login jest już zajęty!");
                        echo json_encode(array_merge(array('msg' => $this->errors), array('status' => 'error')));
                    }
                } else {
                    echo json_encode(array_merge(array('msg' => $this->errors), array('status' => 'error')));
                    
                }



    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_data = array(
        "register-login" => $_POST['register-login'],
        "register-email" => $_POST['register-email'],
        "register-password" => $_POST['register-password'],
        "repeat-register-password" => $_POST['repeat-register-password'],
        "register-type-account" => $_POST['register-type-account']
    );
    $createUser = new Register;
    $createUser->registerUser($user_data);
    

}