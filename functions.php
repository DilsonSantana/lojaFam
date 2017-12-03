<?php
session_start();          
          if(!isset($_SESSION['carrinho'])){
         $_SESSION['carrinho'] = array();
      }
        
      //adiciona produto
        
      if(isset($_POST['acao'])){
        
       //ADICIONAR CARRINHO
        if($_POST['acao'] == 'add'){
            $id = intval($_POST['product']);
            if(!isset($_SESSION['carrinho'][$id])){
                $_SESSION['carrinho'][$id] = 1;
            } else {
                $_SESSION['carrinho'][$id] += 1;
            }
            header("location: cart.php");
        }
           
         //REMOVER CARRINHO
         if($_POST['acao'] == 'del'){
            $id = intval($_POST['product']);
            if(isset($_SESSION['carrinho'][$id])){
               unset($_SESSION['carrinho'][$id]);
            }
         }
           
         //AUMENTAR QUANTIDADE
        if($_POST['acao'] == 'up'){
            foreach($_SESSION['carrinho'] as $id => $qtd){
                $product  = intval($_POST['product']);
                if($id == $product){
                    $qtd = intval($qtd);
                    $_SESSION['carrinho'][$product] = $qtd + 1;
                }
            }
        }


          //DIMINUIR QUANTIDADE
        if($_POST['acao'] == 'down'){
            foreach($_SESSION['carrinho'] as $id => $qtd){
                $product  = intval($_POST['product']);
                if($id == $product){
                    $qtd = intval($qtd);
                    if($qtd == 1){
                        unset($_SESSION['carrinho'][$product]);
                    } else {
                        $_SESSION['carrinho'][$id] = $qtd - 1;
                    }
                }
            }
        }

        //EXCLUIR CARRINHO
        if($_POST['acao'] == 'dropCart'){
            unset($_SESSION['carrinho']);
        }
        
      }         
           
    ?>