<?php 
	include '../functions.php';

	if (isset($_POST['update_submit'])) {
		extract($_POST);

		if ($result = $user->updateUser($id, $username, $last_name, $first_name, $email, $password, $address, $phone)) {
			echo "<div class='text-success'>User modificat cu succes!<a href='users.php'> Click aici pentru lista users. </a></div>";
		} else {
			echo "<div class='text-danger'>S-a produs o eroare la modificarea user-ului! Va rugam reincercati!</div>";
		}

	}

	if (isset($_GET['id']) && is_numeric($_GET['id']) && ($user->getUser($_GET['id']))) {
		$id = $_GET['id'];
		$row = $user->getUser($id);
?>

<!DOCTYPE html>
<html>
<head>
	<title> Update user </title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="shortcut icon" href="../assets/img/bee.png">
	<?php include '../partial/_css_cdn.php';?>
</head>
<body class='font-sans-pro bold'>

	<div class="container m-2">

		<a href="users.php" class="fa fa-arrow-left"></a>
		<h1 class="mb-3">Modificare user</h1>
		<br>

	<form method="post">
		<div class="form-row">
			<div class="col-sm-2">
				<label for="id" class="ml-2 text-center">&nbsp;Id user:</label>
			</div>
			<div class="col-sm-7">
				<input class="form-control" type="text" name="id" readonly value="<?=$id?>">
			</div>
		</div>
		
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="username" class="ml-2">*Username:</label>	
			</div>
			<div class="col-sm-7">
				<input type="text" class="form-control" name="username" value="<?=$row['username']?>" required>
			</div>
		</div>
		
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="first_name" class="bold mx-2">*Prenume:</label>
			</div>
			<div class="col-sm-7">
				<input type="text" class="form-control" name="first_name"required value="<?=$row['first_name']?>">
			</div>
		</div>
				
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="last_name" class="bold mx-2">*Nume:</label>
			</div>
			<div class="col-sm-7">
				<input type="text" class="form-control" name="last_name" required value="<?=$row['last_name']?>">
			</div>
		</div>

		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="email" class="bold mx-2">*Email:</label>
			</div>
			<div class="col-sm-7">
				<input type="email" class="form-control" name="email" value="<?=$row['email']?>" required>
			</div>
		</div>
			
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="password" class="bold mx-2">*Parola:</label>
			</div>
			<div class="col-sm-7">
				<input type="password" class="form-control" name="password" minlength="5" value="<?=$row['password']?>" required>
			</div>
		</div>
			
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="address" class="bold mx-2">Adresa:</label>
			</div>
			<div class="col-sm-7">
				<textarea rows="4" class="form-control" name="address"><?=$row['address']?></textarea>
			</div>
		</div>
		
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="phone" class="bold mx-2">Telefon:</label>
			</div>
			<div class="col-sm-7">
				<input type="phone" class="form-control" name="phone" minlength="10" maxlength="10" value="<?=$row['phone']?>">
			</div>
		</div>
		
		<div class="form-row my-2">
			<div class="col-sm-2"></div>
			<div class="col-sm-7">
				<button name="update_submit" type="submit" class="btn btn-info my-2 form-control">Modifica user</button>
			</div>
		</div>
	
	</form>
	</div>

<?php } ?>

    <?php include '../partial/_scripts.php';?>
</body>
</html>
