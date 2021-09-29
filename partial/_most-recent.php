<!-- Folosim variabila $product din functions -->
<!-- pentru a accesa datele din baza de date -->
<?php

	$product = $product->mostRecentData();

	// cand utilizatorul apasa butonul de AddToCart
	if (isset($_POST['most-recent-submit'])) {
		// add to cart
		if ($_SESSION['id'] != 0) {
			$cart->addToCart($_POST['user_id'], $_POST['item_id']);
		} else {
			header('Location: login.php');
			exit;
		}
	}

?>

<section id="most-recent">
	<div class="container py-5">
		<h4 class="font-raleway">Produse adăugate recent</h4>
		<hr>
		<!-- owl carousel -->
		<div class="owl-carousel owl-theme">
			
			<!-- Preluam primele 10 produse adaugate cel mai tarziu, adica cele mai recente -->
			<?php
			while ($row = $product->fetch_assoc()): ?>
			<div class="item py-2 mr-3">
				<div class="product font-raleway">
					<a href="product.php?id=<?=$row['id']?>">
						<img class="img-fluid" src="./assets/img/<?=$row['image']?>" alt="<?=$row['name']?>" style='height:206px;'>
					</a>
					<div class="text-center mt-2">
						<h6 class="font-raleway bold" style='height:40px;'>
							<?=$row['name']?>
						</h6>
					</div>
					<center>
					<p class="font-raleway-i">
						<?=$row['price']?> RON
					</p>

					<!-- Transmitem variabilele item_id si user_id prin form -->
					<form method="post">

						<input type="hidden" name="item_id" value="<?=$row['id']?>">

						<!-- Daca user-ul nu e logat atribuim valoarea 0 pentru variabila de sesiune 'id' -->
						<input type="hidden" name="user_id" value="<?=$_SESSION['id'] ?? 0;?>">

						<button type="submit" name="most-recent-submit" class="btn btn-warning font-size-12"><i class="fa fa-cart-plus" aria-hidden="true" onclick="window.location.reload();"></i> Add to Cart</button>

					</form>

					</center> 
				</div>
			</div>
		<?php endwhile;?>
		</div>
		<!-- !owl carousel -->		
	</div>
</section>