<?php include_once "functions.php";
require_once('connection.inc.php');
$conn = new mysqli($host,$user,$pass,$dbname);

if (isset($_POST["usuario"]) && !empty($_POST["usuario"])) {
    $usuario = $_POST["usuario"];
    $senha = md5($_POST["senha"]);
    $sql = "SELECT usuario, senha FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' AND ativo = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION["usuarioLogado"] = 1;
        header("Location:index.php");
    } else {
        header("Location:login.php?auth=0");
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Login Page 2 | Creative - Bootstrap 3 Responsive Admin Template</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-img3-body">

    <div class="container">

      <form class="login-form" action='' method="POST">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" name="usuario" class="form-control" placeholder="Username" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" name="senha" class="form-control" placeholder="Password">
            </div>
            <label class="checkbox">
                 <input type="checkbox" value="remember-me"> 
                  Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            <!--<button class="btn btn-info btn-lg btn-block" type="submit">Signup</button>-->
            <?php
                    if(isset($_GET['auth'])){
                        if($_GET['auth'] == 0){
                            echo "<br/><div class='alert'style='text-align:center;' role='alert'>
                                  <strong>Usuário ou senha inválidos!</strong> 
                                </div>";
                        }
                    }
                ?>
        </div>
      </form>

    </div>


  </body>
</html>
