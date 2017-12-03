<?php include_once("header.php");
$con = mysql_connect($host, $user, $pass) or  
    die("Could not connect: " . mysql_error());  
mysql_select_db($dbname);  

	echo'<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td style="text-align:center;">Item</td>
							<td style="text-align:center;">Produto</td>
							<td style="text-align:center;">Price</td>
							<td style="text-align:center;">Quantity</td>';
					
							echo'<td style="text-align:center;">Total</td>';
								if(COUNT($_SESSION['carrinho']) != 0){
									echo'<td style="text-align:center;">
										<input class="btn btn-primary" style="background:black;margin-top:0px;" type="text" name="apagarCarrinho" onclick="apagarCarrinho()" value="Excluir Carrinho">	
									</td>';
								}
						echo'</tr>
					</thead>
					<tbody>';
					foreach($_SESSION['carrinho'] as $id => $qtd){
						$sql   = "SELECT *  FROM produtos WHERE id= '$id'";
						$qr    = mysql_query($sql) or die(mysql_error());
						$ln    = mysql_fetch_assoc($qr);
						$valor = $ln['valor'] * $qtd;
						
						echo'<tr>
						<td style="text-align:center;">
									<a><img src="./UI/images/home/' . $ln['img'] . '" alt="" style="max-height:90px;max-width:90px;padding-right:10px;"></a>
								</td>
								<td style="text-align:center;">
									<h4><a href="product_details.php?product=' . $ln['id'] . '">' . $ln['nome'] . '</a></h4>
									<p>Web Id:  ' . $ln['id'] . '</p>
								</td>
								<td style="text-align:center;">
									<p> R$ ' . $ln['valor'] . '</p>
								</td>
								<td style="text-align:center;">
									<div class="cart_quantity_button">
										<a class="cart_quantity_up" onclick="adicionarProduto(' . $ln['id'] . ')"> + </a>
										<input class="cart_quantity_input" type="text" name="quantity" value="' . $qtd . '" autocomplete="off" size="2">
										<a class="cart_quantity_down" onclick="diminuirProduto(' . $ln['id'] . ')"> - </a>
									</div>
								</td>
								<td style="text-align:center;">
									<p class="cart_total_price"> R$ ' . number_format($valor, 2, ',', ' ') . '</p>
								</td>
								<td style="text-align:center; margin: 20px 0px 0px 0px;" class="cart_delete">
									<a class="cart_quantity_delete" onclick="deletar(' . $ln['id'] . ')"><i class="fa fa-times"></i></a>
								</td>
							</tr>';
					}
			   echo'</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Finalizar compra</h3>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="total_area">
						<ul>';
						$total = 0;
						foreach($_SESSION['carrinho'] as $id => $qtd){
							$sql   = "SELECT *  FROM produtos WHERE id= '$id'";
							$qr    = mysql_query($sql) or die(mysql_error());
							$ln    = mysql_fetch_assoc($qr);
							$total += $qtd * $ln['valor'];
						}
					   echo'<li style="color: #D62617;font-size:22px;">Total <span> R$ ' . number_format($total, 2, ',', ' ') . '</span></li>
						</ul>
						 	<div style="text-align:right">
								<a class="btn btn-primary" href="compra.php">Finalizar</a>
							</div>
					</div>
				</div>
			</div>
			<div class="row">
			</div>
		</div>
	</section><!--/#do_action-->
	

	';

	

	mysql_close($con);  
	include_once("footer.php");