<?php
	session_start();
	include('../verifica_login.php');
	include_once("config.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="pedido.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <link rel="icon" href="../gesempLogo1offName.png">
<meta charset="utf-8">
<title>Categorias</title>
</head>

<body>
	<div id="pagina">
	    
	    
	        <!-- Barra de atalhos lateral -->
	        <div id="sidebar-pagina">
		        <br>
		        <div id="logo-side" style="padding-right= 50px;">
		        	 <a href="../home.php"><img src="../gesempLogo1.png" alt="Image" height="130" width="200"></a>
		        </div>
		       <h6 style="color: white; padding-left: 15px;">Olá, <?php echo $_SESSION['nomeuser'];?></h6>
		        <br>
		            <ul class="sidebar-nav">
		                <li><a href="produtos.php">PRODUTOS</a></li>
	               	 	<li><a href="orders.php">PEDIDOS</a></li>
	                	<li><a href="categorias.php">CATEGORIAS</a></li>
	               		<li><a href="#">PERFIL</a></li>
	               	 	<li><a href="../logout.php">SAIR</a></li>
		            </ul>
	        
	        </div>
	    
	        <!-- conteudo da pagina -->
	        <div id="content-pagina">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-lg-12">
	                        <a href="#" class="btn btn-primary btn-sm" id="sidebar-toggle">Menu</a>
	                        <br>
	                        <br>
	                        <h2>Lista de categorias</h2>
	                        <hr class="hr3">
	                        
	                        <div id="tabela" style="padding-right: 70px; padding-left: 30px;"> 
			                    <script>
									var qnt_result_pg = 5;
									var pagina = 1;
									$(document).ready(function () {
										listar_categoria (pagina, qnt_result_pg);
									});
	
									function listar_categoria (pagina, qnt_result_pg){
										var dados = {
												pagina: pagina,
												qnt_result_pg: qnt_result_pg
										}
										
										$.post('lista_categoria.php', dados, function(retorna){
											$("#tabela").html(retorna);
										});
									}
	
								</script>
		                    
		                     </div>
		                   		
	                    </div>
	                </div>
	            </div>
	        </div>
	    
	</div>
	
    <script>
        $("#sidebar-toggle").click( function (e){ //display do menu
            e.preventDefault();
            $("#pagina").toggleClass("menuDisplayed");
        });



        

    </script>


</body>

</html>