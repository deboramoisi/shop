<?php 

	include_once "./database/class.user.php";
	$user = new User();

	if (isset($_REQUEST['submit-reg'])) {
		extract($_REQUEST);

		$register = $user->register_user($username, $nume, $prenume, $email, $password);

		if ($register) {
			// Successfully
			echo "Utilizator creat cu succes! <a href='login.php'> Click pentru login. </a>";
		} else {
			echo "Utilizatorul exista deja in baza de date.";
		}

	}

?>


<!DOCTYPE html>
<html>
<head>
	<title> Inregistrare </title>
	<link rel="shortcut icon" href="./assets/img/bee.png">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


</head>
<body>

	<div class="container" style="width: 400px; margin: auto;">
		<h1 class="text-center mb-5"> Inregistrare </h1>

		<form action="" method="post" name="inreg">
			<table class="table">
				<tbody>
					<tr>
						<th> Nume: &nbsp;</th>
						<td> 
							<input type="text" name="nume" required> 
						</td>
					</tr>
					<tr>
						<th> Prenume: &nbsp;</th>
						<td> 
							<input type="text" name="prenume" required> 
						</td>
					</tr>
					<tr>
						<th> Username: &nbsp;</th>
						<td> 
							<input type="text" name="username" required> 
						</td>
					</tr>
					<tr>
						<th> Email: &nbsp;</th>
						<td> 
							<input type="email" name="email" required> 
						</td>
					</tr>
					<tr>
						<th> Password: &nbsp;</th>
						<td> 
							<input type="Password" name="password" required minlength="5"> 
						</td>
					</tr>
					<tr>
						<td></td>
						<td> 
							<input type="submit" name="submit-reg" value="Register" class="btn btn-success mr-3"> 
							<a href="index.php" class="btn btn-info">To Index</a>
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>

</body>
</html>