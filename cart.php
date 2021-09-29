<?php 
	session_start();
	ob_start();
	include_once 'functions.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title> Cosul meu </title>
	<!-- CSS -->
	<?php include_once './partial/_css_cdn.php';?>
</head>
<body>

	<!-- NAVBAR -->
	<?php
		include 'header.php';
	?>


	<!-- MAIN -->
	<?php
		include './partial/_cart.php';
	?>
	<!-- !MAIN -->

	<!-- TOTAL -->
	<?php
		include './partial/_cart-total.php';
	?>
	<!-- !TOTAL -->

	<?php
		include './partial/_most-recent.php';
	?>

	<!-- FOOTER -->
	<?php
		include 'footer.php';
	?>


	<!-- SCRIPTS -->
	<?php include_once './partial/_scripts.php';?>
</body>
</html>