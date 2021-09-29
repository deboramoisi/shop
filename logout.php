<?php

	session_start();
	$_SESSION['login'] = false;
	session_destroy();

	include 'functions.php';
	ob_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
	<link rel="shortcut icon" href="./assets/img/bee.png">
	<!-- CSS -->
	<?php include './partial/_css_cdn.php';?>
</head>
<body>

	<!-- start header -->
	<?php 
		include 'header.php';
	?>
	<!-- !start header -->

	<center>
		<h1 class="mt-5">Logout realizat cu succes!</h1>
		<h2 class="mb-5">Va mai asteptam pe la noi :)</h2>
	</center>


	<!-- Most-recent -->
		<?php
			include './partial/_most-recent.php';
		?>
	<!-- !Most-recent -->


	<!-- start footer -->
		<?php
			include 'footer.php';
		?>
	<!-- !start footer -->

	<div height="300px">.</div>
	<!-- SCRIPTS -->
	<?php include './partial/_scripts.php';?>
</body>
</html>>
