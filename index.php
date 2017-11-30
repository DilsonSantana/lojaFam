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
