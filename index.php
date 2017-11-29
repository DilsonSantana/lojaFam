<?php
include_once("header.php");
require_once('./Admin/connection.inc.php');
$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

echo '<div class="header-middle"><!--header-middle-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="logo pull-left">
                    <a href="index.php"><img src="images/home/logo.png" alt="" /></a>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="shop-menu pull-right">
                    <ul class="nav navbar-nav">
                        <li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li>
                        <!--<li><a href="#"><i class="fa fa-user"></i> Account</a></li>-->
                        <!--<li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>-->
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
            <div class="col-sm-12">
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
                        <li class="dropdown"><a href="#">Category<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">

                                <!--category-productsr-->
                                        <li>
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordian" href="#sports">
                                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                        Sportswear
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="sports" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <ul>
                                                        <li><a href="product.php">Nike </a></li>
                                                        <li><a href="product.php">Under Armour </a></li>
                                                        <li><a href="product.php">Adidas </a></li>
                                                        <li><a href="product.php">Puma</a></li>
                                                        <li><a href="product.php">ASICS </a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordian" href="#men">
                                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                        Mens
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="men" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <ul>
                                                        <li><a href="product.php">Fendi</a></li>
                                                        <li><a href="product.php">Guess</a></li>
                                                        <li><a href="product.php">Valentino</a></li>
                                                        <li><a href="product.php">Dior</a></li>
                                                        <li><a href="product.php">Versace</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordian" href="#women">
                                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                        Womens
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="women" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <ul>
                                                        <li><a href="product.php">Fendi</a></li>
                                                        <li><a href="product.php">Guess</a></li>
                                                        <li><a href="product.php">Valentino</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><a href="product.php">Kids</a></h4>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><a href="product.php">Fashion</a></h4>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><a href="product.php">Households</a></h4>
                                            </div>
                                        </li>
                                    <!--/category-products-->
                              </ul>
                        </li> 
                        <li class="dropdown"><a href="blog.php">Blog</a>
                        </li> 
                        <li><a href="contact_us.php">Contact</a></li>
                    </ul>
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
                <div class="features_items">
                    <!--<h2 class="title text-center">Latest Features Items</h2> -->
                </div>';
                    $sql = 'SELECT * from produtos';
                    foreach($db->query($sql) as $row){
                        echo '<div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <div style="height:300px;">';
                                echo '<img src="./UI/images/home/' . $row['id'] . '.jpg" alt="" style="max-height:287;max-width:287;"/>
                                            </div>';
                                echo '<td>' . $row['nome'] . ' </td>';
                                echo '<p> R$ ' .$row['valor'] . '</p>';
                                echo '<a href="product_details.php?product=' . $row['id'] . '" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>';
                                    echo '</div>
                                    </div>
                                </div>
                            </div>';
                    }
                  echo '</div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</section>';

include_once("footer.php");
