<?php
session_start();
$title="Strona Główna";
require_once('views/header.php');
?>
<form action="module/register.php" method="POST">
	<div>
	    <label for="register-login">Wpisz login</label>
        <input type="text" name="register-login" id="register-login">
	</div>
    <div>
        <label for="register-email">Wpisz email</label>
        <input type="email" name="register-email" id="register-email">
    </div>
    <div>
        <label for="register-password" >Wpisz hasło</label> 
        <input type="password" name="register-password" id="register-password">
    </div>
    <div>
        <label for="repeat-register-password">Potwierdź hasło</label>
        <input type="password" name="repeat-register-password" id="repeat-register-password">
    </div>
    <div>
        <label for="client-type-account">Client</label>
        <input type="radio" name="register-type-account" id="client-type-account" value="client" checked>
    </div>
    <div>
        <label for="employer-type-account">Employer</label>
        <input type="radio" name="register-type-account" id="employer-type-account" value="employer">
    </div>
    <button id="register-btn" type="submit">Zarejestruj się</button>
</form>
<div class="resolve-msg"></div>
<script src="js/scripts.js"></script>
<?php
require_once('views/footer.php');
