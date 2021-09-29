 <!-- Afisam SUMA de bani care mai trebuie adaugata pentru a beneficia de transport gratuit :)  -->
	
	<!-- function livrareGratuita() {
		if (isset($_SESSION['total']) && $_SESSION['total'] < 75) {
		$necesar = 75 - $_SESSION['total'];
		echo "<div class='bold font-castoro text-center mb-2' style='background:#bcf5bc;'>Inca $necesar RON pentru a beneficia de transport gratuit! </div>";
		}
	} -->


<?php
	include 'functions.php';

	echo md5('debimea');

	$id = 5;

	$sql = "SELECT * FROM products WHERE id=$id";

	if ($result = $db->conn->query($sql)) {
		$row = $result->fetch_assoc();
	} else {
		echo "Fail";
	}

?>

<!-- ACTUALIZEAZA COSUL BUTON -->
		<div class="row py-2 font-raleway border">
			
			<div class="col-sm-9"></div>
			<div class="col-sm-3">
				<button name="actualizare" class="btn btn-warning">&nbsp;&nbsp;Actualizează coșul &nbsp;&nbsp;</button>
			</div>
		
		</div>
<!-- !ACTUALIZEAZA COSUL BUTON -->

<!DOCTYPE html>
<html>
<head>
	<title>Teste</title>
	<?=css_cdn()?>
</head>
<body>


	<?php include 'header.php';?>
	<section id="main-product" class="py-3">
	<div class="container font-sans-pro">
		<div class="row">
					
			<div class="col-sm-6 py-3">
				<img src="./assets/img/<?=$row['image']?>" class="img-fluid border" alt="Miere">
			</div>

			<!-- TITLU -->
			<div class="col-sm-6 pt-3">
				<h4 class="font-sans-pro bold py-3"> <?=$row['name']?> </h4>
				<hr>

				<!-- GRAMAJ PT ALIMENTE-->
				<div>
					<div class="d-flex">
						Gramaj
						<h4 class="ml-3 color-primary">
							<?=$row['gramaj']?>g
						</h4>
					</div>
							
			</div>
			<hr>

			<!-- PRET -->
			<div>
				<h3 class="color-primary italic col-sm-6">
					<?=$row['price']?>
				</h3>
				<br>
				Cantitate&nbsp;&nbsp;
				<input type="number" name="quantity" min="1" max="10" placeholder="1">
			</div>
			<hr>

			<!-- POLITICI -->	
			<div class="policy">
				
				<div class="d-flex">
					
					<!-- Livrare -->
					<div class="text-center mr-5">
						
						<div class="font-size-20 my-2 color-second">
							<span class="fa fa-home border p-3 rounded-pill"></span>
						</div>
						Livrare la domiciliu
					
					</div>
					
					<!-- Timp de livrare -->
					<div class="text-center mr-5">
						
						<div class="font-size-20 my-2 color-second">
							<span class="fas fa-truck border p-3 rounded-pill"></span>
						</div>
						2-3 zile lucratoare
					
					</div>
					
					<!-- Produs verificat -->
					<div class="text-center mr-5">
							
						<div class="font-size-20 my-2 color-second">
							<span class="fas fa-check border p-3 rounded-pill"></span>
						</div>
						Produs verificat
						
					</div>
				</div>
			</div>

			<hr>
			<div class="row form-row pt-2">
				
				<div class="col">
					<a href="" class="btn btn-danger form-control">Finalizati comanda</a>
				</div>
				
				<div class="col">
					<a href="" class="btn btn-warning form-control"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;Add to Cart</a>
				</div>
			</div>
					
		</div>
		</div>
		<hr>

			<!-- DESCRIERE -->
			<div>
				<h5 class="font-sans-pro bold py-3"> Descriere </h5>

				<?=$row['description']?>
			</div>

			<!-- PROPRIETATI SI CARACTERISTICI -->
			<div>
				<h5 class="font-sans-pro bold py-3"> Proprietati si caracteristici </h5>

				<?=$row['prop_car']?>

			</div>
	</div>
</section>

<?php
	include 'footer.php';
?>

<?=scripts_cdn()?>
</body>
</html>

