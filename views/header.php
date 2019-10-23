<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?= isset($title)? $title : "header"; ?>
	</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/framework.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700&display=swap" rel="stylesheet">
</head>
<body>
<?php require_once('menu.php'); ?>
