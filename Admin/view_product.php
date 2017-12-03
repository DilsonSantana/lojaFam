<?php 
include_once("header.php");
require_once('connection.inc.php');
$conn = new mysqli($host,$user,$pass,$dbname);

if (isset($_POST["id"]) && !empty($_POST["id"])) {
    $id = $_POST["id"];
    $sql1 = "DELETE FROM produtos WHERE id = '$id'";
    $result = $conn->query($sql1);
}

 echo'<!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt "></i>
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
      					<h3 class="page-header"><i class="fa fa fa-bars"></i>Todos os Produtos</h3>
      					<ol class="breadcrumb">
      						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
      						<li><i class="fa fa-bars"></i>Produtos</li>
      						<li><i class="fa fa-square-o"></i> Lista de Produtos</li>
      					</ol>
      				</div>
      			</div>
              <!-- page start-->
              <div class="row">
                <div class="col-sm-12">
                  <h2>Produtos</h2>
                </div>
              </div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th style="border: 1px solid #e3e3e3; width:50px;"><i class="icon_info_alt"></i> Id</th>
                                 <th style="border: 1px solid #e3e3e3; width:70px;"><i class="icon_info_alt"></i> Foto </th>
                                 <th style="border: 1px solid #e3e3e3"><i class="icon_documents"></i> Nome</th>
                                 <th style="border: 1px solid #e3e3e3"><i class="icon_creditcard"></i> Preco</th>
                                 <th style="border: 1px solid #e3e3e3"><i class="icon_cogs"></i> Action</th>
                              </tr>';
                    $sql = "SELECT * FROM produtos ORDER BY id DESC";
                    foreach($conn->query($sql) as $row){  
                          echo'<tr>
                                 <td style="border: 1px solid #e3e3e3;text-align:center; ">'.$row['id'].'</td>
                                 <td style="border: 1px solid #e3e3e3; text-align:center; width:50px;"><img src="../UI/images/home/'.$row['img'].'" width="30" height="30"></td>
                                 <td style="border: 1px solid #e3e3e3">'.$row['nome'].'</td>
                                 <td style="border: 1px solid #e3e3e3">R$ ' . number_format($row['valor'], 2, ',', '.') . '</td>
                                 <td style="border: 1px solid #e3e3e3">
                                  <div class="btn-group">
                                      <a class="btn btn-success" href="edit_product.php?produto='.$row['id'].'" title="Editar Produto" href="#">Editar</i></a>
                                      <a class="btn btn-danger"title="Excluir Produto" onclick="deletar('.$row['id'].')" >Excluir</i></a>
                                  </div>
                                  </td>
                              </tr>';
                        }
                      echo'</tbody>
                        </table>
                      </section>
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
    <script>  
        function deletar(idProduto){
            
            $.post("view_product.php",
            {
                id: idProduto
            },
            function(){
                 location.reload();
            });
        };
    </script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!--For Fancyapp-->
  <!--<script type="text/javascript" src="fancyapp/lib/jquery-1.10.1.min.js"></script> -->
    <script type="text/javascript" src="../fancyapp/source/jquery.fancybox.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="../fancyapp/source/jquery.fancybox.css?v=2.1.5" media="screen" />
  
      <script type="text/javascript">
        $(document).ready(function() {

          $(".fancybox").fancybox();
          });

      </script>

  </body>
</html>';
