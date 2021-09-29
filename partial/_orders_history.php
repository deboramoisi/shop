<?php

	if (isset($_SESSION['id'])) {

		$user_id = $_SESSION['id'];

		$result = $orders->getOrdersForUser($user_id);
	} else {
		header('Location: login.php');
		exit;
	}


?>

<div class="container font-raleway">
	
	<h1 class="my-4">Istoric comenzi</h1>

	<div class="row bold border py-2">
		<div class="col-sm-3">
				Order id
		</div>
		<div class="col-sm-3">
				Order number
		</div>
		<div class="col-sm-3">
				Order date		
		</div>
		<div class="col-sm-3">
				Total	
		</div>
	</div>

	<?php while ($row = $result->fetch_assoc()): ?> 
		
	<div class="row border py-2">
		<div class="col-sm-3">
				<?=$row['order_id']?>
		</div>
		<div class="col-sm-3">
				<?=$row['order_nr']?>
		</div>
		<div class="col-sm-3">
				<?=$row['order_date']?>
		</div>
		<!-- SUBTOTAL -->
		<div class="col-sm-3">
				<?= $row['total']?>
		</div>
	</div>
	
	<?php endwhile; ?>

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
					<a href="./index.php" class="btn btn-success form-control">
					Home
					</a>
				</div>
			</div>
		</div>
	</div>
		
	</div>

</div>