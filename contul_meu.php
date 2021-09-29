<?php
	session_start();
	// buffers the output 
	// ob_start();
	include 'functions.php';


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Contul meu </title>

	<!-- CSS -->
	<?php include'./partial/_css_cdn.php';?>

</head>
<body>

	<!-- start header -->
	<?php 
		include'header.php';
	?>
	<!-- !start header -->


	<!-- start main-site -->
		<main id="main-site">
			
		<?php include './partial/_contul_meu.php'?>		

		</main>
	<!-- !start main-site -->


	<!-- start footer -->
		<?php
			include'footer.php';
		?>
	<!-- !start footer -->


	<!-- SCRIPTS -->
	<?php include'./partial/_scripts.php';?>
	
</body>
</html>