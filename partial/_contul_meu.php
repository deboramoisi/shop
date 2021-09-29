<?php

	if (isset($_SESSION['id'])) {

		$user_id = $_SESSION['id'];

		$current_user = $user->getUser($user_id); 
	}

?>

<div class="container font-raleway">
	
	<h1 class="my-4">Contul meu </h1>

	<!-- NUME PRENUME -->
	<div class="row border py-2">
		<div class="col-sm-3 bold">
				Nume
		</div>
		<div class="col-sm-3">
				<?php echo $current_user['first_name'] . " " . $current_user['last_name']?> 
		</div>
	</div>
		
	<!-- USERNAME -->
	<div class="row border py-2">
		<div class="col-sm-3 bold">
				Username
		</div>
		<div class="col-sm-3">
				<?php echo $current_user['username']?> 
		</div>
	</div>


	<!-- EMAIL -->
	<div class="row border py-2">
		<div class="col-sm-3 bold">
				Email
		</div>
		<div class="col-sm-3">
				<?php echo $current_user['email']?> 
		</div>
	</div>


	<!-- ADRESA -->
	<div class="row border py-2">
		<div class="col-sm-3 bold">
				Adresa
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
	</div>


	<!-- BUTOANE PENTRU REINTOARCERE -->
	<!-- BUTOANE PENTRU FINALIZARE -->
	<div class="row border py-2 my-5">
		<div class="col-sm-6"></div>
		<div class="col-sm-6">
			<div class="form-row">
				<div class="col-sm-6">
					<a href="./cart.php" class="btn btn-info form-control">
					Cos de cumparaturi
					</a>
				</div>
				<div class="col-sm-6">
					<a href="index.php" class="btn btn-success form-control">
					Home
					</a>
				</div>
			</div>
		</div>
	</div>
		
	</div>

</div>