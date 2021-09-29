<?php
	include '../functions.php';

	if (isset($_POST['insert_submit'])) {
		extract($_POST);

		if ($result = $user->register_user($username, $last_name, $first_name, $email, $password, $address, $phone)) {
			echo "<div class='success'>User inserat cu succes!<a href='users.php'> Click aici pentru lista cu users. </a></div>";
		} 

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Insert user </title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="shortcut icon" href="../assets/img/bee.png">
	<?php include '../partial/_css_cdn.php';?>
</head>
<body class='font-sans-pro bold'>

	<div class="m-2">

		<a href="users.php" class="fa fa-arrow-left"></a>
		<h1 class="mb-3">Adaugare user nou</h1>
		<br>

	<form method="post">
	
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="username" class="mx-2">*Username:</label>
			</div>
			<div class="col-sm-7">
				<input type="text" class="form-control" name="username" maxlength="255" required>
			</div>
		</div>
			
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="first_name" class="bold mx-2">*Prenume:</label>
			</div>
			<div class="col-sm-7">
				<input type="text" class="form-control" name="first_name" maxlength="255" required>
			</div>
		</div>
	
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="last_name" class="bold mx-2">*Nume:</label>
			</div>
			<div class="col-sm-7">
				<input class="form-control" type="text" name="last_name" required>
			</div>
		</div>
			
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="email" class="bold mx-2">*Email:</label>
			</div>
			<div class="col-sm-7">
				<input type="email" class="form-control" name="email" required>
			</div>
		</div>
		
		<div class="form-row my-2">
			<div class="col-sm-2 bold">
				<label for="password" class="mx-2">*Parola:</label>
			</div>
			<div class="col-sm-7">
				<input type="password" class="form-control" name="password" minlength="5" required></input>
			</div>
		</div>
		
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="address" class="bold mx-2">Adresa:</label>
			</div>
			<div class="col-sm-7">
				<textarea rows="4" class="form-control" name="address" placeholder="Optional: completati adresa dumneavoastra"></textarea>
			</div>
		</div>
		
		<div class="form-row my-2">
			<div class="col-sm-2">
				<label for="phone" class="bold mx-2">Telefon:</label>
			</div>
			<div class="col-sm-7">
				<input class="form-control" type="phone" name="phone" minlength="10" maxlength="10">
			</div>
		</div>
		
		
		<div class="form-row my-2">
			<div class="col-sm-2"></div>
			<div class="col-sm-7">
				<button name="insert_submit" type="submit" class="btn btn-info my-2 form-control">Adauga user nou</button>
			</div>
		</div>
	            
	</form>
	</div>


    <?php include '../partial/_scripts.php';?>
</body>
</html>