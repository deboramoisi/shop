<?php

	if (isset($_SESSION['id'])) {

		$user_id = $_SESSION['id'];

		if (isset($_REQUEST['submit_address'])) {
		if (isset($_REQUEST['address'])) {
			$result = $user->updateAddress($user_id, $_REQUEST['address']);
			}
		}

		$result = $product->getCartElementsForUser($user_id);

		$current_user = $user->getUser($user_id);

	} else {
		header('Location: login.php');
		exit;
	}

	// daca a selectat butonul de 'finalizarea comenzii' 
	// se va adauga comanda in BAZA DE DATE
	// se seteaza variabilele de sesiune pentru total
		if (isset($_REQUEST['finish'])) {

			$order_nr = $user_id + $_SESSION['total_total'];
			$total = $_SESSION['total_total'];
			$orders->insertOrder($user_id, $order_nr, $total);

			// stergem toate produsele din cos
			$cart->deleteProductsUser($user_id);

			// variabilele de sesiune 'total' si 'sub-total' = 0

			$_SESSION['total_total'] = 0;
			$_SESSION['total'] = 0;
			$_SESSION['nr_items'] = 0;
			// redirectionam spre mesaj de finalizare comanda
			if ($cart && $orders) {
				header('Location: ./partial/_finish.php');	
			}

			else if ($orders == null || $cart == null) {
				echo "Nu s-a putut realiza comanda!";
			}
		} 


?>

<div class="container font-raleway">
	
	<h1 class="my-4">Sumar comanda</h1>

	<div class="row bold border py-2">
		<div class="col-sm-3">
				Produse
		</div>
		<div class="col-sm-3">
				Pret
		</div>
		<div class="col-sm-3">
				Cantitate		
		</div>
		<div class="col-sm-3">
				Sub-total		
		</div>
	</div>

	<?php while ($row = $result->fetch_assoc()): ?>
		
	<div class="row border py-2">
		<div class="col-sm-3">
				<?=$row['name']?>
		</div>
		<div class="col-sm-3">
				<?=$row['price']?>
		</div>
		<div class="col-sm-3">
				<?=$row['quantity']?>
		</div>
		<!-- SUBTOTAL -->
		<div class="col-sm-3">
				<?= $row['quantity'] * $row['price']?>
		</div>
	</div>
	
	<?php endwhile; ?>


	<div class="row border py-2">
		<div class="col-sm-9 bold">TOTAL</div>
		<div class="col-sm-3 bold font-size-16">
			<?=$_SESSION['total_total'] ?? 0;?>
		</div>
	</div>


	<div class="row border py-2 my-5">
		<div class="col-sm-3 bold">
				Livrare
		</div>
		<div class="col-sm-6">
			<!-- Daca adresa user-ului nu e setata, o adaugam in BD -->
				<?php 
					if ($current_user['address'] != null) {
						$_SESSION['address'] = $current_user['address'];
						echo $current_user['address'];
					} else {
						echo 'Nu e setata adresa de livrare';
						$_SESSION['address'] = null;
					}
				?>
		</div>
		<div class="col-sm-3">
			<form method="post">
				<button name="add_address" class="btn btn-warning form-control" type="submit">
					<?php
						if ($_SESSION['address'] != null) 
							echo "Modificare ";
						else 
							echo "Adaugare ";
					?>
					adresa
				</button>
			</form>
		</div>
	</div>

	<?php 
		if (isset($_POST['add_address'])):
	?>

	<!-- ADAUGARE ADRESA PROPRIU-ZISA -->
	<form method="post">
		<div class="row border py-2 my-5">
			<div class="col-sm-3 bold">
				<label for="address">Adresa:</label>
			</div>
			<div class="col-sm-6">
				<textarea rows="2" cols="50" name="address" class="form-control" placeholder="Completati adresa de livrare" required></textarea>
			</div>
			<div class="col-sm-3">
				<button name="submit_address" class="btn btn-success form-control" onclick="window.location.reload();">Adaugare adresa</button>
			</div>
		</div>		
	</form>

	<?php endif; ?>

	<!-- BUTOANE PENTRU REINTOARCERE -->
	<!-- BUTOANE PENTRU FINALIZARE -->
	<div class="row border py-2 my-5">
		<div class="col-sm-6"></div>
		<div class="col-sm-6">
			<div class="form-row">
				<div class="col-sm-6">
					<a href="./cart.php" class="btn btn-info form-control">
					Inapoi la cos
					</a>
				</div>
				<div class="col-sm-6">

				<!-- La apasare buton se va trimite comanda si userul va fi redirectionat -->
				<form>
					<button type="submit" name="finish" class="btn btn-success form-control text-white">
						Finalizare comanda
					</button>
				</form>
				</div>
			</div>
		</div>
	</div>
		
	</div>

</div>