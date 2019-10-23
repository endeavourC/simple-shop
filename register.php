<?php
session_start();
if(isset($_SESSION['is_logged'])){
	if($_SESSION['is_logged']){
		header("Location: panel.php");
	}
}
$title="Zarejestruj się";
require_once('views/header.php');
?>
<div style="min-height:100vh;" class="container pt-12 pb-12 flex flex-justify-center flex-col flex-align-center">
    <h2 class="text-center mt-5">Zarejestruj się</h2>
<form action="module/register.php" method="POST" style="width:50%"class="flex flex-col" >
        <input type="text" class="input mt-1" name="register-login" id="register-login" placeholder="Login">
        <input type="email" class="input mt-1" name="register-email" id="register-email" placeholder="Adres e-mail">
        <input type="password" class="input mt-1" name="register-password" id="register-password" placeholder="Hasło">
        <input type="password" class="input mt-1" name="repeat-register-password" id="repeat-register-password" placeholder="Powtórz hasło">
        <label class="mt-1 mb-1" for="client-type-account">
            Klient
        <input type="radio" name="register-type-account" id="client-type-account" value="client" checked>
        </label>
        <label class="mt-1 mb-1" for="employer-type-account">
            Employer
        <input type="radio" name="register-type-account" id="employer-type-account" value="employer">
        </label>
    <button id="register-btn" class="btn bg-primary white mt-2" type="submit">Zarejestruj się</button>
</form>
<div class="resolve-msg text-center primary pt-4 pb-4 lead"></div>
</div>
<?php
require_once('views/footer.php');
