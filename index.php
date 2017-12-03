<?php
include_once("header.php");

echo '<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 padding-right">';
                    $sql = 'SELECT * from produtos';
                    foreach($conn->query($sql) as $row){
                        echo '<div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <div style="height:300px;">';
                                echo '<img src="./UI/images/home/' . $row['img'] . '" alt="" style="max-height:287;max-width:287;"/>
                                            </div>';
                                echo '<td>' . $row['nome'] . ' </td>';
                                echo '<p> R$ ' .$row['valor'] . '</p>';
                                echo '<a href="product_details.php?product=' . $row['id'] . '" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ver Detalhes</a>';
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
