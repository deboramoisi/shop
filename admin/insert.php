<?php
	include '../functions.php';

	if (isset($_POST['insert_submit'])) {
		extract($_POST);

		if ($result = $product->insertProduct($name, $category, $quantity, $gramaj, $description, $prop_car, $image, $price)) {
			echo "<div class='success'>Produs inserat cu succes!<a href='produse.php'> Click aici pentru lista. </a></div>";
		} 

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Lista produse </title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="shortcut icon" href="../assets/img/bee.png">
	<?php include '../partial/_css_cdn.php';?>
</head>
<body class='font-sans-pro bold'>

	<div class="m-2">

		<a href="produse.php" class="fa fa-arrow-left"></a>
		<h1 class="mb-3">Adaugare produs nou</h1>
		<br>

	<form method="post">
	
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="name" class="mx-2">*Nume:</label>
			</div>
			<div class="col-sm-7">
				<input type="text" class="form-control" name="name" maxlength="255" required>
			</div>
		</div>
			
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="category" class="bold mx-2">*Categorie:</label>
			</div>
			<div class="col-sm-7">
				<input type="text" class="form-control" name="category" maxlength="255" required>
			</div>
		</div>
	
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="quantity" class="bold mx-2">*Cantitate:</label>
			</div>
			<div class="col-sm-7">
				<input class="form-control" type="number" name="quantity" required>
			</div>
		</div>
			
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="gramaj" class="bold mx-2">Gramaj:</label>
			</div>
			<div class="col-sm-7">
				<input type="number" class="form-control" name="gramaj">
			</div>
		</div>
		
		<div class="form-row my-2">
			<div class="col-sm-2 bold">
				<label for="description" class="mx-2">Descriere:</label>
			</div>
			<div class="col-sm-7">
				<textarea rows="7" class="form-control" name="description"></textarea>
			</div>
		</div>
		
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="prop_car" class="bold mx-2">Proprietati si caracteristici:</label>
			</div>
			<div class="col-sm-7">
				<textarea rows="7" class="form-control" name="prop_car"></textarea>
			</div>
		</div>
		
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="image" class="bold mx-2">*Imagine:</label>
			</div>
			<div class="col-sm-7">
				<input class="form-control" type="file" name="image" required>
			</div>
		</div>
		
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="price" class="bold mx-2">*Price:</label>
			</div>
			<div class="col-sm-7">
				<textarea class="form-control" name="price"></textarea>
			</div>
		</div>
		
		<div class="form-row my-2">
			<div class="col-sm-2"></div>
			<div class="col-sm-7">
				<button name="insert_submit" type="submit" class="btn btn-info my-2 form-control">Adauga produs nou</button>
			</div>
		</div>
	            
	</form>
	</div>


    <?php include '../partial/_scripts.php';?>
</body>
</html>