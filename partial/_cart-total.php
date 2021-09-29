<section id="total-cart">
	
	<div class="container-fluid py-5 font-raleway">
		
		<div class="row">
			
			<div class="col-sm-4"></div>
			<div class="col-sm-8">
				
				<div class="form-row px-3">
					
					<div class="col-sm-7 offset-3 font-raleway color-third-bg py-3 text-center">
						Total Cos
					</div>
				

		<!-- Folosesc variabile de sesiune pentru afisarea totalului si subtotalului -->
					<div class="col-sm-7 offset-3 border py-3 px-4">
						<div class="row">
							<div class="col-sm-5 offset-2">
								Sub-total
							</div>
							<div class="col-sm-5 bold">
								<?=$_SESSION['total'] ?? 0;?>  RON
							</div>
						</div>
					</div>
							
					<div class="col-sm-7 offset-3 border py-3 px-4">
						<div class="row">
							<div class="col-sm-5 offset-2">
								Livrare
							</div>
							<div class="col-sm-5">
								<?php  
								if(isset($_SESSION['total'])) {
									// Daca subtotalul e peste 75 RON avem transport gratuir
									if ($_SESSION['total'] >= 75 ) {
										$livrare = 0;
										echo "<span class='bold' style='color:green;'>Livrare gratuită</span>";
										$_SESSION['total_total'] = $_SESSION['total'];
									} else { 
										$livrare = 17.90;
										echo "<span class='bold'>" . $livrare . "RON </span>";
										$_SESSION['total_total'] = $_SESSION['total'] + $livrare;
									}
								}
								?>

							</div>
						</div>
					</div>
					
					<div class="col-sm-7 offset-3 border py-3 px-4">
						<div class="row">
							<div class="col-sm-5 offset-2">
								Total
							</div>
							<div class="col-sm-5 bold border-left">
								<?=$_SESSION['total_total'] ?? 0;?> RON
							</div>
						</div>
					</div>
								
					<div class="col-sm-7 offset-3 border py-3 px-4">
						<a href="order.php" class="btn btn-warning color-black form-control text-white">Continuă cu finalizarea comenzii</a>
					</div>
				
				</div>
			
			</div>
		
		</div>
	
	</div>
		
</section>