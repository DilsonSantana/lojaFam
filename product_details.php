<?php include_once("header.php");
require_once('./Admin/connection.inc.php');
$conn = new mysqli($host,$user,$pass,$dbname);

// if (isset($_GET["product"]) && !empty($_GET["product"])) {
    $product = $_GET["product"];
	$sql = "SELECT id, nome, valor FROM produtos WHERE id = '$product'";

    // if ($result->num_rows > 0) {
    //     header("Location:index.php");
    // } else {
    //     header("Location:login.php?auth=0");
	// }
	
// } 
foreach($conn->query($sql) as $row){
		
	echo'<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left"><a href="index.php"><img src="images/home/logo.jpg" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="mainmenu pull-left">
						<ul class="nav navbar-nav collapse navbar-collapse">
							<li><a href="index.php" class="active">Home</a></li>
							<li><a href="login.php" class="active">Login</a></li>
							<li><a href="cart.php" class="active">Carrinho</a></li>
						</ul>
					</div>
				</div>
				
			</div>
			</div>
		</div>
	</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<!--Code for Zoom-->
							<div class="view-product">';
							
								echo '<img src="UI/images/home/' . $row['id'] . '.jpg" />';
							
						echo '</div>
							<!--Code for zoom ends-->
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>' . $row['nome'] . '</h2>
								<p>Web ID: ' . $row['id'] . '</p>
								<img src="images/product-details/rating.png" alt="" /><br>
								<h1 style="color: #FE980F">' . $row['valor'] . '</h1>
								<br/>
								<form method="post" action="cart.php">
									<p style="float:"><strong>Quantidade: &nbsp;</strong>
									<input type="text" name="" value="1" style="width:90px;text-align:center;border-radius: 2px;border: 1px solid #e3e3e3;">
									</p>
									
									<input type="submit" name="form_details" value="Add to cart" class="cart cart_wishlist" style="padding:6px 36px;margin-top:20px;float:left">
								</form>
							
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								
								<li><a href="#tag" data-toggle="tab">Tag</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >	
								<p style="padding:40px 60px;text-align:justify"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
									incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud
									exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure 
									dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
								</p>		
							</div>
							
							<div class="tab-pane fade" id="tag" >
								
								
							</div>
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
						</div>
					</div><!--/category-tab-->
				</div>
			</div>
		</div>
	</section>';
}
	include_once("footer.php");