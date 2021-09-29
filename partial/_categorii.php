<?php
	$result = $product->getCategoryName();
?>


<div class="container pt-5 font-castoro">
	<h4 class="bold">Categorii de produse</h4>
	<hr>
</div>

<section id="apicole">
	<div class="container py-2 font-castoro bold" style='display:flex;flex-wrap:wrap;'>

				<?php while ($row = $result->fetch_assoc()): ?>

				<a href="produse_apicole.php?category=<?=$row['category']?>" class="m-5 border color-secondary">
					<img src="./assets/img/<?=$row['category']?>.jpg">
					<center>
							
					<p class="m-3">
						<?=$row['category']?>
					</p>
					</center>
				</a>
				
			<?php endwhile;?>
			
	</div>		
	
</section>