<?php
	include '../functions.php';

	$results = $product->getData();
?>

<!DOCTYPE html>
<html>
<head>
	<title> Lista produse </title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="shortcut icon" href="../assets/img/bee.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<?php include '../partial/_css_cdn.php';?>
</head>
<body class="font-sans-pro">

	<div class="m-3">

		<h1 class="bold my-2">Inregistrari tabela produse</h1>

		<a href="Insert.php" class="btn btn-info my-3">Adauga produs nou</a>
		<a href="../index.php" class="btn btn-warning my-3 mx-3 text-white">
			<img src="../assets/img/bee.png">
			&nbsp;Inapoi la magazin	
		</a>


	<table border="1" class="table">
		<thead class="thead-dark">
			<th scope="col">Id</th>
			<th scope="col">Nume</th>
			<th scope="col">Categorie</th>
			<th scope="col">Stoc</th>
			<th scope="col">Gramaj*</th>
			<th scope="col">Descriere</th>
			<th scope="col">Proprietati si caracteristici*</th>
			<th scope="col">Imagine</th>
			<th scope="col">Pret</th>
			<th>Edit</th>
			<th>Delete</th>
		</thead>
     		
        <?php while ($row = $results->fetch_assoc()): ?>
            <tr scope="row">
            	<td><?=$row['id']?></td>
            	<td><?=$row['name']?></td>
            	<td><?=$row['category']?></td>
            	<td><?=$row['quantity']?></td>
            	<td><?=$row['gramaj']?></td>
            	<td><?=$row['description']?></td>
            	<td><?=$row['prop_car']?></td>
            	<td><?=$row['image']?></td>
            	<td><?=$row['price']?></td>
            	<td><a href="update.php?id=<?=$row['id']?>"><img src="https://img.icons8.com/cotton/64/000000/ball-point-pen--v1.png"/></a></td>
            	<td><a href="delete.php?id=<?=$row['id']?>"><img src="https://img.icons8.com/wired/64/000000/trash.png"/></a></td>
            </tr>
      <?php endwhile;?>
    </table>
	</div>


    <?php include '../partial/_scripts.php';?>
</body>
</html>

<!-- 
<a href="https://icons8.com/icon/95126/ball-point-pen">Ball Point Pen icon by Icons8</a> 
<a href="https://icons8.com/icon/49382/trash">Trash icon by Icons8</a>
-->