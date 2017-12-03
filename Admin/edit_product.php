<?php 
require_once('connection.inc.php');
$conn = new mysqli($host,$user,$pass,$dbname);

include_once("header.php");

$id = $_GET["produto"];

if (isset($_POST["nome"]) && !empty($_POST["nome"])) {
    $extensao1 = pathinfo($_FILES['foto']['name']);
    $extensao1 = ".".$extensao1['extension'];
    $foto = time().uniqid(md5()).$extensao1;

    if(file_exists("../UI/images/home/$foto"))
    {
        $a = 1;
        while(file_exists("../UI/images/home/[$a]$foto"))
        {
            $a++;    
        }

        $foto = "[".$a."]$foto";    
    }
    var_dump($foto);
    if(!move_uploaded_file($_FILES['foto']['tmp_name'], "../UI/images/home/".$foto))
    {
        $nome = $_POST["nome"];
        $preco = $_POST["preco"];
        $sql1 = "UPDATE produtos SET nome = '$nome', valor = '$preco' WHERE id = '$id'";
        $conn->query($sql1);
        header("Location:view_product.php");    
    } else {

        $nome = $_POST["nome"];
        $preco = $_POST["preco"];
        $sql1 = "UPDATE produtos SET nome = '$nome', valor = '$preco', img = '$foto' WHERE id = '$id'";
        $conn->query($sql1);
        header("Location:view_product.php"); 
    }
} 

    $sql = "SELECT * FROM produtos WHERE id = '$id'";

    foreach($conn->query($sql) as $row){

 echo'<!--sidebar start-->
      <aside>
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
      		  <div class="row">
      				<div class="col-lg-12">
      					<h3 class="page-header"><i class="fa fa fa-bars"></i>Editar Produto</h3>
      					<ol class="breadcrumb">
      						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
      						<li><i class="fa fa-bars"></i>Produtos</li>
      						<li><i class="fa fa-square-o"></i>Editar</li>
      					</ol>
      				</div>
      			</div>
              <!-- page start-->
              <div class="row" style="margin-bottom:40px">
                 <div class="col-lg-1">
                </div>
                <div class="col-lg-8">
                  <form  action="" method="POST" enctype="multipart/form-data">  
                    <h3>Nome</h3>
                    <input type="text" class="form-control" name="nome" placeholder="nome.." value="' . $row['nome'] . '">
                    <h3>Image</h3>
                    <input type="file" class="form-control" name="foto" accept="image/png, image/jpeg, image/jpg">
                    <h3>Preço</h3>
                    <input type="text" class="form-control" name="preco" placeholder="preço.." value="' . $row['valor'] . '">
                    <br/>
                    <input type="submit" class="btn btn-primary" style="width:150px;float:right">
                  </form>
                </div>
                <div class="col-lg-3">
                </div>
              </div>

              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script>
  </body>
</html>';
        }
