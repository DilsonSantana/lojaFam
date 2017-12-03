<?php
session_start();          
          if(!isset($_SESSION['usuarioLogado'])){
         $_SESSION['usuarioLogado'] = array();
      }
?>