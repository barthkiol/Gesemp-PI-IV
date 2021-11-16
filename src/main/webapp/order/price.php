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
<title>Cotação</title>
</head>

<body>
	<div id="pagina">
	    
	    
	        <!-- Barra de atalhos lateral -->
	       <div id="sidebar-pagina">
		        <br>
		        <div id="logo-side" style="padding-right: 50px;">
		        	 <a href="../home.php"><img src="../gesempLogo1.png" alt="Image" height="130" width="200"></a>
		        </div>
		       <h6 style="color: white; padding-left: 15px;">Olá, <?php echo $_SESSION['nomeuser'];?></h6>
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
	                        <div class="alert" id="alert" role="alert"></div>
	                        <br>
	                         <?php
							if(isset($_SESSION['msg'])){
								echo $_SESSION['msg'];
								unset ($_SESSION['msg']);
							}	
							$result_ord = "SELECT COUNT(id) AS num_result from pedido";
							$resultado_ord = mysqli_query($conexao, $result_ord);
							$row_ord = mysqli_fetch_assoc($resultado_ord);
							
							$quantidade_order = ceil($row_ord['num_result']);
							
							$id_pedido = filter_input(INPUT_GET, 'idPedido', FILTER_SANITIZE_NUMBER_INT);
							
							$id_cons = $id_pedido;
							$result_pedido = "SELECT * FROM `cotacao`INNER JOIN pedido on cotacao.pedido_id = pedido.id INNER JOIN produto on cotacao.produto_id = produto.id where pedido.id = $id_cons;";
							$resultado_pedido = mysqli_query($conexao, $result_pedido);
							$row_pedido = mysqli_fetch_row($resultado_pedido);

							if(!empty($id_cons)){
								if($row_pedido > 0){

							
							//echo $id_pedido . "<br>";
							//echo $id_cons . "<br>";
							
							$result_pedido_cot = "SELECT * FROM `cotacao`INNER JOIN pedido on cotacao.pedido_id = pedido.id INNER JOIN produto on cotacao.produto_id = produto.id where pedido.id = $id_cons;";
							$resultado_pedido_cotacao = mysqli_query($conexao, $result_pedido_cot);
							
							?>
	                        <h1>Pedido #<?php echo $row_pedido[4];?></h1>
	                        <hr class="hr3">
	                        <br>
	                        <form action="criar_cotacao.php" method="POST">
	                        	<div style="padding-right: 100px; margin: 0px 10px;">
		                        <table data-role="table" class="table table-striped" id="table-1" style="padding: 100px; margin: 0px 10px;">
									<thead style="padding: 100px;">
										<tr>
											<th scope="col">ID do Produto</th>
											<th scope="col">Nome</th>
											<th scope="col">Quantidade</th>
											<th scope="col">Cotação</th>
											<th scope="col">Entrega</th>
										</tr>
									</thead>
									<tbody style="padding: 100px;">
										<?php
											$a = 0;
											while($row_pedido = mysqli_fetch_row($resultado_pedido_cotacao)){
										
										echo '<tr>';
											echo '<td>' . $row_pedido[18] . '</td>';
											echo '<td>' . $row_pedido[21] . '</td>';
											echo '<td>' . $row_pedido[1] . '</td>';
											echo '<td><input type="text" class="form-control" id="form_price" placeholder="R$" name="cotacao_' . $a .'" required></td>';
											echo '<td><input type="text" class="form-control" id="form_delivery" placeholder="" name="entrega_' . $a . '" required></td>';
											echo '<input type="hidden" class="form-control" id="linhas" name="id_' . $a . '"  value="'. $row_pedido[0] . '" >';
										echo '</tr>';
										?>
										<?php
											$a++;
										}?>
									</tbody>
								</table>
								</div>
								<br>
								<input type="hidden" class="form-control" id="linhas" value=<?php echo $a; ?> name="linhas">
								<input class="btn btn-success" type="submit" value="Enviar" id="enviar">
							</form>
		                    <?php 
									}else{
							?>
							<div class='alert alert-danger' role='alert'>Pedido não encontrado!</div>
							<?php
									}
								}else{
							?>
							<div class='alert alert-danger' role='alert'>Pedido não encontrado!</div>
		                    <?php
							}
							?>
		                     
		                   		
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