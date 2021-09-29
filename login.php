<?php 

	session_start();
	include_once './database/class.user.php';
	$user = new User();
	
	if (isset($_REQUEST['submit-login'])) {
		extract($_REQUEST);
		// verificam daca parola si username/email corespunde cu cel din BD
		$result = $user->login_user($emailusername, $password);

		if ($result) {
			echo "Conexiune reusita!";
			header('location:index.php');
		} else {
			echo "Username sau parola incorecte!";
		}
	}


?>


<!DOCTYPE html>
<html>
<head>
	<title> Login </title>
	<link rel="shortcut icon" href="./assets/img/bee.png">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

	<div class="container" style="width: 500px; margin: auto;">

		<h1 class="text-center mb-5"> Login </h1>

		<form method="post" name="login_form">

		<table class="table">
			<tbody>
				<tr>
					<th> Username or Email: &nbsp; </th>
					<td> 
						<input type="text" name="emailusername" required> 
					</td>
				</tr>
				<tr>
					<th> Password &nbsp; </th>
					<td> 
						<input type="password" name="password" minlength="5" required> 
					</td>
				</tr>
				<tr>
					<td></td>
					<td> 
						<input class="btn btn-success mr-2" value="&nbsp;&nbsp;Login&nbsp;&nbsp;" type="submit" name="submit-login"> 
						<a class="btn btn-info" href="register.php"> &nbsp;Register&nbsp; </a>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
	</div>

</body>
</html>