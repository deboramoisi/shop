<?php
	
	// cand utilizatorul apasa butonul de AddToCart
	if (isset($_POST['produs-submit'])) {
		// add to cart
		if ($_SESSION['id'] != 0) {
			$cart->addToCart($_POST['2'], $_POST['item_id'], $_POST['quantity']);
		} else {
			header('Location: login.php');
			exit();
		}
	}

	if (isset($_GET['id']) && is_numeric($_GET['id'])) {
		$id = $_GET['id'];
		$result = $product->getProductById($id);

?>


<section id="main-product" class="py-3">
	<div class="container font-sans-pro">
		<div class="row">
					
			<div class="col-sm-6 py-3">
				<img src="./assets/img/<?=$result['image']?>" class="img-fluid border" alt="Miere">
			</div>

			<!-- TITLU -->
			<div class="col-sm-6">
				<h4 class="font-sans-pro bold py-3">	<?=$result['name']?> 
				</h4>
				<?php
					if ($result['quantity'] > 0) { 
						echo '<h5 class="bold font-size-16 text-success"> In stoc';
					}
					else {
						echo '<h5 class=" bold font-size-16 text-danger"> Indisponibil';
					}
				?>
							</h5>
				<hr>

				<!-- GRAMAJ-->
				<?php if ($result['gramaj'] != 0): ?>
				<?php if ($result['category'] != 'Echipamente'): ?>
				<div>
					<div class="d-flex">
						Gramaj
						<h4 class="ml-3 color-primary">
							<?=$result['gramaj']?>
							<!-- Afisam g pentru produse apicole -->
							<?php if ($result['category'] == 'Produse_apicole')
							echo "g"; 
							// si ml pentru cosmetice
							else if($result['category'] == 'Cosmetice')
								echo "ml";?>
						</h4>
					</div>			
				</div>
				<hr>
			<?php endif;?>
		<?php endif;?>

			<!-- PRET -->
			<form method="post">
			<div>
				<h3 class="color-primary italic col-sm-6">
					<?=$result['price']?> RON
				</h3>
				<br>
				Cantitate&nbsp;&nbsp;
				<input type="number" name="quantity" min="1" max="10" placeholder="1" value="1">
			</div>
			
			<hr>

			<!-- POLITICI -->	
			<div class="policy">
				
				<div class="d-flex">
					
					<!-- Livrare -->
					<div class="text-center mr-4">
						
						<div class="font-size-20 my-2 color-second">
							<span class="fa fa-home border p-3 rounded-pill"></span>
						</div>
						Livrare la domiciliu in 2-3 zile lucratoare
					
					</div>
					
					<!-- Timp de livrare -->
					<div class="text-center mr-4">
						
						<div class="font-size-20 my-2 color-second">
							<span class="fas fa-truck border p-3 rounded-pill"></span>
						</div>
						Livrare gratuita la comenzi de peste 75 RON
					
					</div>
					
					<!-- Produs verificat -->
					<div class="text-center mr-4">
							
						<div class="font-size-20 my-2 color-second">
							<span class="fas fa-check border p-3 rounded-pill"></span>
						</div>
						Produs verificat
						
					</div>
				</div>
			</div>

			<hr>
			<div class="row form-row pt-5">
				
				<div class="col">
					<a href="./cart.php" class="btn btn-danger form-control">Finalizati comanda</a>
				</div>
				
				<div class="col">
					<!-- Adaugare in cos -->
					

						<input type="hidden" name="item_id" value="<?=$result['id']?>">

						<input type="hidden" name="user_id" value="<?=$_SESSION['id'] ?? 0;?>">

						<button type="submit" onClick="window.location.reload()" name="produs-submit" class="btn btn-warning form-control"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to Cart</button>

					</form>
				</div>
			</div>
					
		</div>
		</div>
		<hr>

			<!-- DESCRIERE -->
			<div>
				<h5 class="font-sans-pro bold py-3"> Descriere </h5>
				<span class="py-5"><?=$result['description']?> </span>
			</div>


			<?php if ($result['prop_car'] != null): ?>
			<!-- PROPRIETATI SI CARACTERISTICI -->
			<div>
				<h5 class="font-sans-pro bold pt-3 pb-5"> Proprietati si caracteristici </h5>
				<?=$result['prop_car']?>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php } ?>

