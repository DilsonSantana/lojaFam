<?php include_once("header.php");

$product = $_GET["product"];
$sql = "SELECT id, nome, valor, img FROM produtos WHERE id = '$product'";

foreach($conn->query($sql) as $row){
		
	echo'<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-6">
							<!--Code for Zoom-->
							<div class="view-product">';
							
								echo '<img src="UI/images/home/' . $row['img'] . '" style="max-height:400px;max-width:400px;" />';
							
						echo '</div>
							<!--Code for zoom ends-->
						</div>
						<div class="col-sm-6">
							<div class="product-information"><!--/product-information-->
								<h2>' . $row['nome'] . '</h2>
								<p>Web ID: ' . $row['id'] . '</p>
								<img src="images/product-details/rating.png" alt="" /><br>
								<h1 style="color: #FE980F">R$ ' . $row['valor'] . '</h1>
								<br/>
								<form method="post" action="cart.php">
									</p>
									<input type="text" hidden name="product" value="' . $row['id'] . '">
									<input type="text" hidden name="acao" value="add">
									<input type="submit" name="add" value="Adicionar" class="cart cart_wishlist" style="padding:6px 36px;margin-top:20px;float:left;margin-left:0px;margin-top:0px;">
								</form>
							
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
				</div>
			</div>
		</div>
	</section>';
}
	include_once("footer.php");