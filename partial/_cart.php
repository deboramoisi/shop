<?php

	// Daca utilizatorul nu e conectat, trimite-l la pagina de login/register
	
	if (isset($_SESSION['id'])) {
		$user_id = $_SESSION['id'];
		$cart->cartItems($user_id);
	}
	else {
			header('Location: login.php');
			exit;
	}


	// Daca utilizatorul vrea sa stearga un produs de tot
	if (isset($_POST['deleteItem'])) {
		if (isset($_POST['cart_id'])) {
			$cart->deleteProductFromCart($_POST['cart_id']);
			$cart->cartItems($user_id);
		}
	}


	// Daca utilizatorul vrea sa editeze cantitatea si apasa butonul de edit
	if (isset($_POST['edit_button'])) {
		$cart_id = $_POST['cart_id'];
		$quantity = $_POST['cantitate'];
		
		// Daca avem cantitate 0 stergem produsul de tot
		if ($quantity == 0) {
			$cart->deleteProductFromCart($cart_id);
		} else { 
		// Update cantitate produs
		$result = $cart->updateExistingProduct($cart_id, $quantity);
		// Update variabila sesiune pt nr produse
		$cart->cartItems($user_id);
		}
	}

	if (isset($_POST['golire'])) {

		// stergem toate produsele din cos
			$result = $cart->deleteProductsUser($user_id);

			// variabilele de sesiune 'total' si 'sub-total' = 0
			$_SESSION['total_total'] = 0;
			$_SESSION['total'] = 0;
			$_SESSION['nr_items'] = 0;
			$cart->cartItems($user_id);

			if ($result) {
				echo "<p class='text-black bold font-size-20 m-3' style='background:red'>Items deleted successfully!</p>";
			} else {
				echo 'ERROR';
			}

	}

?>


<section id="cart" class="py-3">

	<!-- decrease the width to 75% -->
	<div class="container-fluid w-75 font-castoro">
		
		<h3 class="font-castoro bold pt-2 pb-4">Coș de cumpărături</h3>

		<!-- GOLIRE COS DE CUMPARATURI -->
		<form method="post">
			<div class="text-right mb-2 font-raleway">
				<button name="golire" class="btn btn-danger" onClick="window.location.reload()"><i class="fa fa-trash" aria-hidden="true"></i> &nbsp;Golire coș</button>
			</div>
		</form>

		<!-- Headers pentru tabel cu produse din cos -->
		<div class="row py-2 font-raleway color-third-bg">

			<div class="col-sm-1"></div>
			<div class="col-sm-1"></div>
			<div class="col-sm-4">PRODUS</div>
			<div class="col-sm-2">PREȚ</div>
			<div class="col-sm-2">CANTITATE</div>
			<div class="col-sm-2">SUB-TOTAL</div>
		
		</div>

		<!-- Metoda returneaza o matrice cu toate produsele din cart table -->
		<?php

			$total = 0;

			// Preluam toate elementele din cos ale userului actual
			$my_cart = $product->getCartElementsForUser($user_id);

			// Pentru fiecare element, calculam subtotalul si il atribuim variabilii de sesiune 'total'
			// De asemenea, calculam si numarul de elemente din cart
			if ($my_cart) {
				while($row = $my_cart->fetch_assoc()) {
				$total += ($row['price'])*($row['quantity']);
				$_SESSION['total'] = $total;
		?>


			<div class="row py-2 font-raleway border">
				
				<div class="col-sm-1 text-center">
					

				<form method="post">

					<input type="hidden" name="cart_id" value="<?=$row['cart_id']?>">

					<button name="deleteItem" type="submit" class="btn fa fa-times-circle font-size-20" aria-hidden="true" onClick="window.location.reload()"></button>

					</div>
					
					<div class="col-sm-1">
						<img src="./assets/img/<?=$row['image']?>" class="img-fluid" alt="Miere">
					</div>

					<div class="col-sm-4">
						 <?=$row['name']?>
					</div>
								
					<div class="col-sm-2">
						 <?=$row['price']?> RON 
					</div>
				
					<!-- Cantitatea preluata cu ajutorul interogarii bazei de date -->
					<div class="col-sm-2">
						<input type="number" name="cantitate" min="0" max="30" value="<?=$row['quantity']?>">
						<button type="submit" name="edit_button" class="btn btn-success font-size-10"><img src="./assets/img/edit.png" onClick="window.location.reload()"></button>
					</div>
				
				</form>		
				<!-- Calculam subtotalul pentru fiecare inregistrare -->
				<div class="col-sm-2">
					 <?=($row['price'])*($row['quantity'])?> RON 
				</div>
					
			</div>
		<?php
			} 
		} 
		?>

	</div>

</section>