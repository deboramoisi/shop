<?php

	// Preluam toate categoriile pentru a li afisa in dropdown menu
	$result = $product->getCategoryName();

	$nr_items = (isset($_SESSION['nr_items'])) ? $_SESSION['nr_items'] : 0;

?>

<header id="header">
	
	<nav class="navbar navbar-dark navbar-expand-lg color-primary-bg navbar-fixed-top">
		
		<a class="navbar-brand" href="index.php">ApiGroza</a>
		
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="about_us.php">Despre noi </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="categorii.php">Categorii </a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Produse
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">

					<!-- Preluam categoriile din tabel, pentru a le putea adauga automat in pagina in momentul crearii unei noi categorii de administrator -->
					<?php while ($row = $result->fetch_assoc()): ?>
						<a class="dropdown-item" href="produse_apicole.php?category=<?=$row['category']?>">
							<?=$row['category']?>
						</a>
					<?php endwhile; ?>
					</div>
				</li>

				<!-- Daca adminul e logat -->
				<!-- Modificari tabela produse -->
				<?php 
				if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin'): ?>
					<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Tabel Produse
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="./admin/produse.php">Lista produse</a>
						<a class="dropdown-item" href="./admin/insert.php">Adauga noi produse</a>
					</div>
					</li>
				<?php endif;?>

				<!-- Doar pentru admin -->
				<!-- Modificari tabela users -->
				<?php 
				if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin'): ?>
					<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Tabel Users
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="./admin/users.php">Lista users</a>
						<a class="dropdown-item" href="./admin/users_insert.php">Adauga user nou</a>
					</div>
					</li>
				<?php endif;?>
			
			</ul>

		<?php 
		if (isset($_SESSION['login'])):
		?>  
		
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link text-white" href="cart.php"> 
				 (<?=$nr_items?>)
				 <i class="fa fa-shopping-cart" aria-hidden="true"></i>
				Cos de cumparaturi</a>
			</li>

			<li class="nav-item">
				<a href="logout.php" class="nav-link text-white">Logout</a>
			</li>
		</ul>
			
		<?php else: ?>
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="login.php">Login</a>
			</li>
			
			<li class="nav-item">
				<a class="nav-link" href="register.php">Register</a>
			</li>
		</ul>
		
		<?php endif; ?>	
		
		</div>
	</nav>
</header>