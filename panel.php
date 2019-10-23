<?php
session_start();
require_once('module/User.php');
if(!isset($_SESSION['is_logged'])){
    header("Location: login.php");
} else {
    $user = new User;
    $permissions = $user->get_permission($_SESSION['user_id']);
};

$title="Panel";
require_once('views/header.php');
?>
<?php
    if($permissions['type_account'] == "client"){
        require_once('module/clientPanel.php');
    } elseif($permissions['type_account'] == "employer") {
        require_once('module/adminPanel.php');
    } else {
        header("Location: login.php");
    }
?>
<?php
require_once('views/footer.php');
