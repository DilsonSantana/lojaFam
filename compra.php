<?php 
include_once("header.php");
unset($_SESSION['carrinho']);

echo '<section id="do_action" style="min-height:350px;">
        <div class="container">
            <div class="heading">
                <h3>Compra Realizada com sucesso!</h3>
            </div>
            
            <div class="row">
            </div>
        </div>
        </section><!--/#do_action-->';

include_once("footer.php");