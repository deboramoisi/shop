<?php
	 session_start();
	 ob_start();
	 include 'functions.php'
?>

<!DOCTYPE html>
<html>
<head>
	<title> Procesare comanda </title>
	<?php include_once './partial/_css_cdn.php'?>
</head>
<body>

	<?php include 'header.php'?>

	<?php include './partial/_order.php'?>

	<?php include 'footer.php'?>

	<?php include_once './partial/_scripts.php'?>
</body>
</html>
