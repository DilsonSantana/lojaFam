
	<footer id="footer"><!--Footer-->
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2017 Loja Fam. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="grupo.html">DevAugusta</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <!--For Image Zoom-->
    <script src='js/jquery-1.8.3.min.js'></script>
	<script src='js/jquery.elevatezoom.js'></script>
	<script>
	    $('#zoom_01').elevateZoom({
	    zoomType: "inner",
		cursor: "crosshair",
		zoomWindowFadeIn: 500,
		zoomWindowFadeOut: 750
		   }); 
	</script>
	<!--For Fancyapp-->
	<!--<script type="text/javascript" src="fancyapp/lib/jquery-1.10.1.min.js"></script> -->
    <script type="text/javascript" src="fancyapp/source/jquery.fancybox.js?v=2.1.5"></script>
  	<link rel="stylesheet" type="text/css" href="fancyapp/source/jquery.fancybox.css?v=2.1.5" media="screen" />
  
      <script type="text/javascript">
        $(document).ready(function() {

          $('.fancybox').fancybox();
          });


		  function adicionarProduto(id){
			$.post('cart.php',
			{
				acao: 'up',
				product: id
			},
			function(){
				location.reload();
			});
		};
		
		 function diminuirProduto(id){
			$.post('cart.php',
			{
				acao: 'down',
				product: id
			},
			function(){
				location.reload();
			});
		};

		function deletar(id){
			$.post('cart.php',
			{
				acao: 'del',
				product: id
			},
			function(){
				location.reload();
			});
		};

		function apagarCarrinho(){
			$.post('cart.php',
			{
				acao: 'dropCart'
			},
			function(){
				location.reload();
			});
		};
      </script>

    
</body>
</html>