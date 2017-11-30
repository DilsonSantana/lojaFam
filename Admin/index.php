<?php 
include_once("header.php");
require_once('connection.inc.php');
$conn = new mysqli($host,$user,$pass,$dbname);

    if (isset($_POST["login"]) && !empty($_POST["login"])) {
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $sql = "SELECT login, senha FROM usuarios WHERE login = '$login' AND senha = '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location:solicitacoes.php");
    } else {
        header("Location:login.php?auth=0");
    }
} 

   echo'<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Produtos</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="add_product.php">Adicionar</a></li>    
                          <li><a class="" href="view_product.php">Lista de Produtos</a></li>                          
                      </ul>
                  </li> 
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li><i class="fa fa-laptop"></i>Dashboard</li>						  	
					</ol>
				</div>
			</div>
              
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box green-bg">
                        <i class="fa fa-cubes"></i>';
                        $sql1 = 'SELECT COUNT(*) as total from produtos';
                        foreach($conn->query($sql1) as $row){
                    echo'<div class="count">' . $row['total'] . '</div>';
                        }
					echo'<div class="title"> Produtos</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
			</div><!--/.row--> 
            
          <!-- project team & activity start -->
            <br><br>

          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
    <script src="js/jquery.js"></script>
	<script src="js/jquery-ui-1.10.4.min.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>



    <script src="js/jquery.customSelect.min.js" ></script>
    <script src="js/scripts.js"></script>
  <script>
      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $("select.styled").customSelect();
      });

  </script>

  </body>
</html>';
