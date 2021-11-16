<?php
	session_start();
	include('../verifica_login.php');
	include_once("config.php");

	$idComprador = $_SESSION['iduser'];
	$result_carrinho = "SELECT * FROM `carrinho` inner join produto on carrinho.produto_id = produto.id inner join categoria on produto.categoria_id = categoria.id where comprador_id = $idComprador";
	$resultado_carrinho = mysqli_query($conexao, $result_carrinho);
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="pedido.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <link rel="icon" href="../gesempLogo1offName.png">
    
    <style>
		#botao{
			padding-left: 85%;
		}
		#pagina.menuDisplayed #botao{
			padding-left: 84%;
		}
		form input[type=text]{
			width: 200px;
			height: 45px;
			border: 1px solid #ccc;
			border-radius: 20px;
		}
		form input[type=submit]{
			margin: 10px 10px;
		}
		
	</style>
	
<meta charset="utf-8">
<title>Confirmar Pedido</title>
</head>

<body>
	<div id="pagina">
	    
	    
	        <!-- Barra de atalhos lateral -->
	        <div id="sidebar-pagina">
	        <br>
	        <div id="logo-side" style="padding-right= 50px;">
	        	 <a href="home.php"><img src="../gesempLogo1.png" alt="Image" height="130" width="200"></a>
	        </div>
	       <h6 style="color: white; padding-left: 15px;">Olá, <?php echo $_SESSION['nomeuser'];?></h6>
	       <h6 style="color: white; padding-left: 15px;">Logado como, <?php echo $_SESSION['userLog'];?></h6>
	        <br>
	            <ul class="sidebar-nav">
	                <li><a href="../products/produtos.php">PRODUTOS</a></li>
	                <li><a href="orders.php">PEDIDOS</a></li>
	                <li><a href="../category/categorias.php">CATEGORIAS</a></li>
	                <li><a href="../user/usuarios.php">USUÁRIOS</a></li>
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
	                        <h2>Confirmar Pedido!</h2>
	                        <hr class="hr3">
	                        <h2>Carrinho</h2>
	                        <br>
	                       
								<form action="">
									<label for="form_numOrder">Número do pedido:</label>
									<input type="text" class="form-control" id="form_numOrder" maxlength="10" name="numPedido" required onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
									<input type="submit" class="btn btn-success">
								</form>
							
							<br><br>
	                        <div id="tabela_cart" style="padding-right: 100px;">
								<table class="table table-striped" id="tabelaCart">
									<thead class="thead-light">
										<tr>
											<th scope="col">Id Produto</th>
											<th scope="col">Nome</th>
											<th scope="col">Categoria</th>
											<th scope="col">Quantidade</th>
										</tr>
									</thead>
									<tbody>
										<?php
											while($row_carrinho = mysqli_fetch_row($resultado_carrinho)){
										?>
										<tr>
											<td><?php echo $row_carrinho[1]; ?></td>
											<td><?php echo $row_carrinho[7]; ?></td>
											<td><?php echo $row_carrinho[12]; ?></td>
											<td><?php echo $row_carrinho[2]; ?></td>
										</tr>
										<?php
										}?>
									</tbody>
								</table>
							</div>
							<br><br>
							
	                        
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