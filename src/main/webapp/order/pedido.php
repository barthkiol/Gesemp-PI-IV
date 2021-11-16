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
<title>Pedido</title>
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
							$result_pedido = "SELECT * FROM pedido left JOIN aprovador on pedido.aprovador_id = aprovador.id left join comprador on pedido.comprador_id = comprador.id where pedido.id = $id_cons;";
							$resultado_pedido = mysqli_query($conexao, $result_pedido);
							$row_pedido = mysqli_fetch_row($resultado_pedido);

							if(!empty($id_cons)){
								if($row_pedido > 0){

							
							//echo $id_pedido . "<br>";
							//echo $id_cons . "<br>";
							
							$result_produto = "SELECT * FROM cotacao INNER JOIN pedido on cotacao.pedido_id = pedido.id INNER JOIN produto on cotacao.produto_id = produto.id where pedido.id = $id_cons;";
							$resultado_produto = mysqli_query($conexao, $result_produto);
							
							?>
							<?php 
							if(isset($_SESSION['pedido_atualizado'])):
							?>
							<div id="sucesso" class="alert alert-success" role='alert'>
							<p>Pedido atualizado com sucesso!</p>
							</div>
							<?php
							endif;
							unset($_SESSION['pedido_atualizado']);
							?>
	                        <h1>Pedido #<?php echo $row_pedido[0];?></h1>
	                        <hr class="hr3">
	                        <div id="div_pedido">
	                        
		                        <div id="div_label">
			                        <h5>Comprador:</h5>
			                        <label id="comprador"> <?php echo $row_pedido[20];?></label>
			                    </div>   
			                    <div id="div_label">
			                        <h5>Aprovador:</h5> 
			                        <label id="aprovador"><?php echo $row_pedido[16];?></label>
			                    </div>
			                    <div id="div_label">
			                        <h5>Data do pedido:</h5> 
			                        <label id="data"><?php echo $row_pedido[2];?></label>
			                    </div>
			                    <div id="div_label">
			                        <h5>Status:</h5> 
			                        <label id="status"><?php echo $row_pedido[8];?></label>
			                    </div>
			                     <div id="div_label">
			                        <h5>Tipo de pagamento:</h5> 
			                        <label id="tipo_pagamento"><?php echo $row_pedido[10];?></label>
			                    </div>
			                    <div id="div_label">
			                        <h5>Tipo de Entrega:</h5> 
			                        <label id="tipo_entrega"><?php echo $row_pedido[9];?></label>
			                    </div>
			                    <div id="div_label">
			                        <h5>Total:</h5> 
			                        <label id="total">R$ <?php echo $row_pedido[11];?></label>
			                    </div>
			                    <div id="div_label">
			                        <h5>Parcelas:</h5> 
			                        <label id="parcela"><?php echo $row_pedido[7];?></label>
			                    </div>
			                    
			                    <?php 
									if(($row_pedido[8] >= 7) && ($row_pedido[8] != 8) && ($_SESSION['userLog'] == "Aprovador")){
								?>
								<form action="" method="post">
									<input type="hidden" class="form-control" id="form_order" name="idOrder" value=<?php echo $id_cons ?> >
									<div id="div_label">
				                        <input class="btn btn-success" type="submit" value="Confirmar Entrega" formaction="fecha_pedido.php?idEntregue=<?php echo $row_pedido[0];?>" id="entregue">
				                    </div>
				                    
				                <?php 
									if(($row_pedido[8] != 9) && ($_SESSION['userLog'] == "Aprovador")){
								?>
				                    <div id="div_label">
				                        <input class="btn btn-primary" type="submit" value="Parcialmente Entregue" formaction="fecha_pedido.php?idParc=<?php echo $row_pedido[0];?>" id="parcEntregue">
				                    </div>
			                	<?php
									}
								?>
				                    
				                    <div id="div_label">
				                        <input class="btn btn-danger" type="submit" value="Cancelar Pedido" formaction="fecha_pedido.php?idCancel=<?php echo $row_pedido[0];?>" id="cancelar">
				                    </div>
								</form>
								<?php
									}
								?>
			                    
			                   <div id="div_itens">
		                    		<h4>Itens:</h4>
		                    		<hr class="hr3">
									<table data-role="table" class="table table-striped" id="table-1">
										<thead>
											<tr>
												<th scope="col">ID</th>
												<th scope="col">Nome</th>
												<th scope="col">Quantidade</th>
											</tr>
										</thead>
										<tbody>
											<?php
												while($row_produto = mysqli_fetch_row($resultado_produto)){
											?>
											<tr>
												<td><?php echo $row_produto[18]; ?></td>
												<td><?php echo $row_produto[21]; ?></td>
												<td><?php echo $row_produto[1]; ?></td>
											</tr>
											<?php
											}?>
										</tbody>
									</table>
									<br>
		                   			<br>
		                   		</div>
		                   		
		                   		<?php 
									if($row_pedido[8] >= 5){
								?>
		                   		<div id="div_nfe">
		                   			<h4>Nota Fiscal:</h4>
		                    		<hr class="hr3">
		                    		<div id="div_label">
			                        	<h5>Número de serie:</h5>
			                        	<label id="nfe_serie"><?php echo $row_pedido[5];?></label>
			                    	</div>
			                    	<div id="div_label">
			                        	<h5>Número:</h5> 
			                        	<label id="nfe_number"><?php echo $row_pedido[4];?></label>
			                    	</div>
			                    	<div id="div_label">
			                        	<h5>Chave:</h5> 
			                        	<label id="nfe_token"><?php echo $row_pedido[3];?></label>
			                    	</div>
			                    	<div id="div_label">
			                        	<h5>Código de rastreio:</h5> 
			                        	<label id="nfe_token"><?php echo $row_pedido[1];?></label>
			                    	</div>
		                   		</div>
		                   		<?php 
									}
								?>
								<?php
									if(($row_pedido[8] == 2) && ($_SESSION['userLog'] == "Aprovador")){
									$result_count_forn = "SELECT fornecedor.id FROM `cotacao_fornecedor`INNER JOIN cotacao on cotacao_fornecedor.cotacao_id = cotacao.id inner JOIN pedido on cotacao.pedido_id = pedido.id INNER JOIN fornecedor on cotacao_fornecedor.fornecedor_id = fornecedor.id where pedido.id = $id_cons GROUP by fornecedor.id;";
									$resultado_count_forn = mysqli_query($conexao, $result_count_forn);
								?>
								
								<div id="div_label">
									<h4>Cotações de Fornecedores:</h4>
			                    	<hr class="hr3">
		                    	</div>
		                    	<?php
									while($row_countForn = mysqli_fetch_row($resultado_count_forn)){
									$result_cotacoes_forn = "SELECT * FROM `cotacao_fornecedor`INNER JOIN cotacao on cotacao_fornecedor.cotacao_id = cotacao.id inner JOIN pedido on cotacao.pedido_id = pedido.id INNER JOIN fornecedor on cotacao_fornecedor.fornecedor_id = fornecedor.id inner JOIN produto on  cotacao.produto_id = produto.id where pedido.id = $id_cons and fornecedor.id = $row_countForn[0];";

									$resultado_cotacoes_forn = mysqli_query($conexao, $result_cotacoes_forn);
									$row_cotacoes_forn = mysqli_fetch_row($resultado_cotacoes_forn);
									
									$result_total = "SELECT SUM(preco) FROM `cotacao_fornecedor`INNER JOIN cotacao on cotacao_fornecedor.cotacao_id = cotacao.id inner JOIN pedido on cotacao.pedido_id = pedido.id INNER JOIN fornecedor on cotacao_fornecedor.fornecedor_id = fornecedor.id inner JOIN produto on  cotacao.produto_id = produto.id where pedido.id = $id_cons and fornecedor.id = $row_countForn[0];";
									$resultado_total = mysqli_query($conexao, $result_total);
									$row_total = mysqli_fetch_row($resultado_total);



								?>
								<div style="padding-right: 600px;">
									<h5 style="float: left;">Fornecedor: <?php echo $row_cotacoes_forn[26] ?>  Total: R$ <?php echo $row_total[0] ?></h5>
									
									
									<table data-role="table" class="table table-striped" id="table-1">
										<thead>
											<tr>
												<th scope="col">Nome do Item</th>
												<th scope="col">Quantidade</th>
												<th scope="col">Preço</th>
												<th scope="col">Entrega</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$result_cotacoes_forn_produto = "SELECT * FROM `cotacao_fornecedor`INNER JOIN cotacao on cotacao_fornecedor.cotacao_id = cotacao.id inner JOIN pedido on cotacao.pedido_id = pedido.id INNER JOIN fornecedor on cotacao_fornecedor.fornecedor_id = fornecedor.id inner JOIN produto on  cotacao.produto_id = produto.id where pedido.id = $id_cons and fornecedor.id = $row_countForn[0];";
												$resultado_cotacoes_forn_produto = mysqli_query($conexao, $result_cotacoes_forn_produto);
												while($row_cotacoes_produto = mysqli_fetch_row($resultado_cotacoes_forn_produto)){
											?>
											<tr>
												<td><?php echo $row_cotacoes_produto[32]; ?></td>
												<td><?php echo $row_cotacoes_produto[6]; ?></td>
												<td><?php echo $row_cotacoes_produto[3]; ?></td>
												<td><?php echo $row_cotacoes_produto[4]; ?></td>
											</tr>
											<?php
												}
											?>
										</tbody>
									</table>
									<form action="salva_cot_pedido.php" method="POST">
										<input type="hidden" class="form-control" id="form_nome" name="idForn" value=<?php echo $row_cotacoes_forn[23] ?> >
										<input type="hidden" class="form-control" id="form_order" name="idOrder" value=<?php echo $id_cons ?> >
										<input type="hidden" class="form-control" id="form_aprovador" name="idAprovador" value=<?php echo $_SESSION['iduser'] ?> >
										<input class="btn btn-primary" type="submit" value="Selecionar Cotação" id="enviar">
									</form>
									<br>
									<br>								
								</div>
								<?php
										}
									}
								?>
								
								<?php
									if(($row_pedido[8] == 3) && ($_SESSION['userLog'] == "Aprovador")){
								?>
								<div>
									<div id="div_label">
										<h4>Dados de Frete/Pagamento</h4>
		                    			<hr class="hr3">
		                    		</div>
		                    		
		                    		<div style="float: left">		                    		
										<form action="pagamento_pedido.php" method="POST">
										<div id="div_label">
											<label for="form_pagamento">Tipo de Pagamento</label>
											<input style="width: 70%; border: 1px solid #ccc; margin: 10px 10px; border-radius: 20px;" type="text" class="form-control" id="form_pagamento" name="tipoPagamento" >
										</div>
										<div id="div_label">
											<label for="form_pagamento">Tipo de Entrega</label>
											<input style="width: 70%; border: 1px solid #ccc; margin: 10px 10px; border-radius: 20px;" type="text" class="form-control" id="form_entrega" name="tipoEntrega">
										</div>
										<div id="div_label">
											<label for="form_pagamento">Parcelas</label>
											<input style="width: 70%; border: 1px solid #ccc; margin: 10px 10px; border-radius: 20px;" type="number" class="form-control" id="form_parcelas" name="parcelas">
										</div>
										<input type="hidden" class="form-control" id="form_order" name="idOrder" value=<?php echo $id_cons ?> >
										<div id="div_label">
											<br><br>
											<input class="btn btn-success" type="submit" value="Enviar Pagamento" id="enviar">
										</div>
										</form>
									</div>
								</div>
								<?php
									}
								?>
								
		                    </div> 
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