<?php
	session_start();
	// buffers the output 
	ob_start();
	include 'functions.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> ApiGroza </title>

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
			
			<!-- Banner owl-carousel -->
			<?php
				include'./partial/_banner-owl-carousel.php';
			?>
			<!-- !Banner owl-carousel -->

			<!-- Most-recent -->
			<?php
				include'./partial/_most-recent.php';
			?>
			<!-- !Most-recent -->

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