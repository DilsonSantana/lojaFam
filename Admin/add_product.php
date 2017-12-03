<?php 
require_once('connection.inc.php');
$conn = new mysqli($host,$user,$pass,$dbname);

include_once("header.php");

if (isset($_POST["nome"]) && !empty($_POST["nome"])) {

    $extensao = pathinfo($_FILES['foto']['name']);
    $extensao = ".".$extensao['extension'];
    $foto = time().uniqid(md5()).$extensao;

    if(file_exists("../UI/images/home/$foto"))
    {
        $a = 1;
        while(file_exists("../UI/images/home/[$a]$foto"))
        {
            $a++;    
        }

        $foto = "[".$a."]$foto";    
    }

    if(!move_uploaded_file($_FILES['foto']['tmp_name'], "../UI/images/home/".$foto))
    {
        echo "
            <script type='text/javascript'>alert('Erro no upload do arquivo!')</script>";    
    } else {

        $nome = $_POST["nome"];
        $preco = $_POST["preco"];
        $sql = "INSERT INTO produtos (nome, valor, img) VALUES('$nome','$preco', '$foto')";
        $conn->query($sql);
        header("Location:view_product.php"); 
    }
} 

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
      					<h3 class="page-header"><i class="fa fa fa-bars"></i>Adicionar Produto</h3>
      					<ol class="breadcrumb">
      						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
      						<li><i class="fa fa-bars"></i>Produtos</li>
      						<li><i class="fa fa-square-o"></i>Adicionar</li>
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
                    <input type="text" class="form-control" name="nome" placeholder="nome..">
                    <h3>Image</h3>
                    <input type="file" class="form-control" name="foto" accept="image/png, image/jpeg, image/jpg">
                    <h3>Preço</h3>
                    <input type="text" class="form-control" name="preco" placeholder="preço..">
                    <h3>Detalhes</h3>
                    <!-- <div class="panel panel-default"> -->
                      <div class="panel-heading" >
                        <!-- <div class="text-muted bootstrap-admin-box-title">TinyMCE Editor Full </div> -->
                      </div>
                      <div class="bootstrap-admin-panel-content">
                          <textarea id="tinymce_full"  name="detalhes" rows="10"></textarea>
                      </div>
                    <!-- </div> -->
                    <br/>
                    <input type="submit" value="Save" name="form_add_product" class="btn btn-primary" style="width:150px;float:right">
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

    <script type="text/javascript" src="js/tinymce/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
            $(function() {
                // TinyMCE Full
                tinymce.init({
                    selector: "#tinymce_full",
                });
            });
    </script>
  </body>
</html>';
