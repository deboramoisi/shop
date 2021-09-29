<?php
	include '../functions.php';

	$result = $user->getUsers();
?>

<!DOCTYPE html>
<html>
<head>
	<title> Lista users </title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="shortcut icon" href="../assets/img/bee.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<?php include '../partial/_css_cdn.php';?>
</head>
<body class="font-sans-pro">

	<div class="m-3">

		<h1 class="bold my-2">Inregistrari tabela users</h1>

		<a href="users_insert.php" class="btn btn-info my-3">Adauga user nou</a>
		<a href="../index.php" class="btn btn-warning my-3 mx-3 text-white">
			<img src="../assets/img/bee.png">
			&nbsp;Inapoi la magazin	
		</a>


	<table border="1" class="table">
		<thead class="thead-dark">
			<th scope="col">Id</th>
			<th scope="col">Username</th>
			<th scope="col">Prenume</th>
			<th scope="col">Nume</th>
			<th scope="col">Email</th>
			<th scope="col">Parola</th>
			<th scope="col">Adresa*</th>
			<th scope="col">Numar de telefon</th>
			<th>Edit</th>
			<th>Delete</th>
		</thead>
     		
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr scope="row">
            	<td><?=$row['id']?></td>
            	<td><?=$row['username']?></td>
            	<td><?=$row['last_name']?></td>
            	<td><?=$row['first_name']?></td>
            	<td><?=$row['email']?></td>
            	<td><?=$row['password']?></td>
            	<td><?=$row['address']?></td>
            	<td><?=$row['phone']?></td>
            	<td><a href="users_update.php?id=<?=$row['id']?>"><img src="https://img.icons8.com/cotton/64/000000/ball-point-pen--v1.png"/></a></td>
            	<td><a href="users_delete.php?id=<?=$row['id']?>"><img src="https://img.icons8.com/wired/64/000000/trash.png"/></a></td>
            </tr>
      <?php endwhile;?>
    </table>
	</div>


    <?php include '../partial/_scripts.php';?>
</body>
</html>
