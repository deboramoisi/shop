<?php
	session_start();
	ob_start();
	include 'functions.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title> About us </title>
	<!-- CSS -->
	<?php include './partial/_css_cdn.php';?>
</head>
<body>

	<!-- Navbar -->
	<?php
		include 'header.php';
	?>

	<!-- Main -->
	<?php 
		include './partial/_about_us.php';
	?>
	<!-- !Main -->

	<!-- Footer -->
	<?php
		include 'footer.php';
	?>

	<!-- Scripts -->
	<?php include './partial/_scripts.php';?>
</body>
</html>

