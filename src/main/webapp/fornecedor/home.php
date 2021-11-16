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
    <link rel="icon" href="gesempLogo1offName.png">
    
    <style>
		#form_qnt{
			width: 100px;
			float: left;
		}
		
		#addDados{
			float: left;
			margin-left: 50px;
		}
		
		#botao{
			padding-left: 85%;
		}
		#pagina.menuDisplayed #botao{
			padding-left: 84%;
		}
		body .modal-ku{
			
  			margin: auto;
		}
		
	</style>
	
<meta charset="utf-8">
<title>Home</title>
</head>

<body>
	<div id="pagina">
	    
	    
	        <!-- Barra de atalhos lateral -->
	        <div id="sidebar-pagina">
	        <br>
	        <div id="logo-side" style="padding-right= 50px;">
	        	 <a href="home.php"><img src="gesempLogo1.png" alt="Image" height="130" width="200"></a>
	        </div>
	       <h6 style="color: white; padding-left: 15px;">Olá, <?php echo $_SESSION['nomeuser'];?></h6>
	       <h6 style="color: white; padding-left: 15px;">Logado como, <?php echo $_SESSION['userLog'];?></h6>
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
	                        <a href="#" class="btn btn-primary btn-sm" id="sidebar-toggle"><img src="menu.png" alt="Image" height="20" width="20"/></a>
	                        
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  
</body>

</html>