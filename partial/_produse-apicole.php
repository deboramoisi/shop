<?php
	
	// cand utilizatorul apasa butonul de AddToCart
	if (isset($_POST['produse-submit'])) {
		// add to cart
		if ($_SESSION['id'] != 0) {
			$cart->addToCart($_POST['user_id'], $_POST['item_id']);
		} else {
			header('Location: login.php');
			exit;
		}
	} 

	$title = "";

	if (isset($_GET['category']) && (!is_numeric($_GET['category']))) {

		$category = $_GET['category'];
		
		switch ($category) {
			case 'Produse_apicole':
				$title = "Produse apicole";
				break;
			
			case 'Cosmetice':
				$title = "Cosmetice";
				break;

			case 'Echipamente':
				$title = "Echipamente";
				break;

			case 'Matci':
				$title = 'Matci';
				break;

			case 'Familii':
				$title = 'Familii de albine';
				break;
		}

		$result = $product->getProductsByCategory($category);

?>

<div class="container pt-5 font-raleway">
	<h4 class="bold"><?=$title?></h4>
	<h6 class="italic"><?=$result->num_rows;?> produse</h6>
	<hr>
</div>

<section id="apicole">
	<div class="container py-2 font-raleway" style='display:flex;flex-wrap:wrap;'>
			<?php foreach($result as $row): ?>

				<div class="m-2 border p-1">
					<a href="product.php?id=<?=$row['id']?>" class=" color-secondary">
						<img src="./assets/img/<?=$row['image']?>" >
						<center>
							<?=$row['name']?>
							<p>
								<?=$row['price']?> &nbsp;RON
							</p>
					</a>

					<form method="post">

						<input type="hidden" name="item_id" value="<?=$row['id']?>">

						<input type="hidden" name="user_id" value="<?=$_SESSION['id'] ?? 0;?>">

						<button type="submit" onClick="window.location.reload()" name="produse-submit" class="btn btn-warning font-size-12 mb-2"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to Cart</button>

					</form>
				</center>
				</div>
			
			<?php endforeach; ?>
			
	</div>		

</section>
<?php } ?>