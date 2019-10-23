<?php
session_start();
if(isset($_SESSION['is_logged'])){
	if($_SESSION['is_logged']){
		header("Location: panel.php");
	}
}
$title="Logowanie";
require_once('views/header.php');

?>
<div style="min-height:100vh;" class="container pt-12 pb-12 flex flex-justify-center flex-col flex-align-center">
	<h2 class="mt-5 text-center">Zaloguj się</h2>
	<form action="module/login.php"  style="width:50%"class="flex flex-col" method="post">
		<input class="input mb-2" type="text" name="login" placeholder="Login lub email">
		<input class="input mb-2" type="password" name="password" placeholder="Hasło">
		<button id="login-btn" class="btn bg-primary white mt-1" type="submit">Zaloguj</button>
	</form>
	<p class="resolve-msg text-center primary pt-4 pb-4"></p>
</div>

<?php
require_once('views/footer.php');
