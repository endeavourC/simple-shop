<?php
$title="Logowanie";
require_once('views/header.php');
?>
<form action="module/login.php" method="post">
	<input type="text" name="login">
	<input type="password" name="password">
	<button type="submit">Zaloguj</button>
</form>
<?php
require_once('views/footer.php');
