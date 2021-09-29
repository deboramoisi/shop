<?php
	include '../functions.php';

	if (isset($_POST['delete_submit'])) {
		$id = $_POST['id'];

		$result = $product->deleteProduct($id);
		if ($result) {
			echo "<div class='text-success font-sans-pro font-size-20'>Produs sters cu succes! <a href='produse.php'>Click aici pentru intoarcere la lista.</a></div>";
		}

	}

	if (isset($_GET['id']) && is_numeric($_GET['id']) && ($product->getProductById($_GET['id']))) {
		
		$id = $_GET['id'];
		$row = $product->getProductById($id);
?>

<!DOCTYPE html>
<html>
<head>
	<title> Stergere produs </title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="shortcut icon" href="../assets/img/bee.png">
	<?php include '../partial/_css_cdn.php';?>
</head>
<body class='font-sans-pro bold'>

	<div class="container m-2">

		<h2 class="mb-3 text-danger"><span class="fa fa-exclamation-triangle">&nbsp;</span>Sunteti sigur ca doriti sa stergeti urmatorul produs din baza de date?</h2>
		<br>

	<form method="post">
		<div class="form-row">
			<div class="col-sm-2">
				<label for="id" class="ml-2 text-center">&nbsp;Id produs:</label>
			</div>
			<div class="col-sm-7">
				<input class="form-control" type="text" name="id" readonly value="<?=$id?>">
			</div>
		</div>
		
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="name" class="ml-2">*Nume:</label>	
			</div>
			<div class="col-sm-7">
				<input type="text" class="form-control" name="name" maxlength="255" value="<?=$row['name']?>" readonly>
			</div>
		</div>
		
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="category" class="bold mx-2">*Categorie:</label>
			</div>
			<div class="col-sm-7">
				<input type="text" class="form-control" name="category" maxlength="255" readonly value="<?=$row['category']?>">
			</div>
		</div>
				
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="quantity" class="bold mx-2">*Cantitate:</label>
			</div>
			<div class="col-sm-7">
				<input type="number" class="form-control" name="quantity" readonly value="<?=$row['quantity']?>">
			</div>
		</div>

		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="gramaj" class="bold mx-2">Gramaj:</label>
			</div>
			<div class="col-sm-7">
				<input type="number" class="form-control" name="gramaj" readonly value="<?=$row['gramaj']?>">
			</div>
		</div>
			
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="description" class="bold mx-2">Descriere:</label>
			</div>
			<div class="col-sm-7">
				<textarea readonly rows="7" class="form-control" name="description"><?=$row['description']?></textarea>
			</div>
		</div>
			
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="prop_car" class="bold mx-2">Proprietati si caracteristici:</label>
			</div>
			<div class="col-sm-7">
				<textarea readonly rows="7" class="form-control" name="prop_car"><?=$row['prop_car']?></textarea>
			</div>
		</div>
		
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="image" class="bold mx-2">*Imagine:</label>
			</div>
			<div class="col-sm-7">
				<input type="file" class="form-control" name="image" readonly value="<?=$row['image']?>">
			</div>
		</div>
			
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="price" class="bold mx-2">*Price:</label>
			</div>
			<div class="col-sm-7">
				<input type="number" class="form-control" name="price" readonly value="<?=$row['price']?>"></input>
			</div>
		</div>
		
		<div class="row my-2">
			<div class="col-sm-2"></div>
			<div class="form-row col-sm-7"> 
				<div class="col-sm-6">
					<button name="delete_submit" type="submit" class="btn btn-danger my-2 form-control">Sterge</button>
				</div>
				<div class="col-sm-6">
					<a href="produse.php" class="btn btn-info my-2 form-control">Cancel</a>
				</div>
			</div>

		</div>
	
	</form>
	</div>


    <?php include '../partial/_scripts.php';?>
</body>
</html>

<?php } ?>