<?php
session_start();
if(!isset($_SESSION['is_logged'])){
    header("Location: login.php");
};
$title="Logowanie";
require_once('views/header.php');

?>
koszyk
<?php
require_once('views/footer.php');
