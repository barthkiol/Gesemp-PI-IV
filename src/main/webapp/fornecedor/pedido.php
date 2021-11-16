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
	                        <a href="#" class="btn btn-primary btn-sm" id="sidebar-toggle" style="border-radius: 20px;">Menu</a>
	                        <div class="alert" id="alert" role="alert"></div>
	                        
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
							$idFornecedor = $_SESSION['iduser'];
							
							$result_produto = "SELECT * FROM cotacao_fornecedor INNER JOIN cotacao on cotacao_fornecedor.cotacao_id = cotacao.id INNER JOIN pedido on cotacao.pedido_id = pedido.id INNER JOIN produto on cotacao.produto_id = produto.id where pedido.id = $id_cons and cotacao_fornecedor.fornecedor_id = $idFornecedor";
							$resultado_produto = mysqli_query($conexao, $result_produto);
							
							
							
							$result_cotForn = "SELECT * FROM cotacao_fornecedor INNER JOIN cotacao on cotacao_fornecedor.cotacao_id = cotacao.id INNER JOIN pedido on cotacao.pedido_id = pedido.id INNER JOIN produto on cotacao.produto_id = produto.id where pedido.id = $id_cons and cotacao_fornecedor.fornecedor_id = $idFornecedor;";
							$resultado_cotForn = mysqli_query($conexao, $result_cotForn);
							$row_cotForn = mysqli_fetch_row($resultado_cotForn);
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
			                        <h5>Data do pedido:</h5> 
			                        <label id="data"><?php echo $row_pedido[2];?></label>
			                    </div>
			                    <div id="div_label">
			                        <h5>Status:</h5> 
			                        <label id="status"><?php echo $row_pedido[8];?></label>
			                    </div>
			      
			                    <?php 
									if($row_cotForn > 0){
								?>
								
								<?php
									if($row_pedido[8] == 6){
								?>
								
									<div style="float: left; width: 100%">
									<h4>Despache:</h4>
			                    	<hr class="hr3">
			                    	</div>
			                   		<div id="div_itens">
			                   			<form action="despachar_pedido.php" method="post">	                   	
					                    <div id="div_label">
					                        <h5>Tipo de Entrega:</h5> 
					                        <label id="tipo_entrega"><?php echo $row_pedido[9];?></label>
					                    </div>
					                    
					                   
				                        <div id="div_label">
				                        	<h5>Código de rastreio:</h5> 
				                        	<input style="width: 70%; border: 1px solid #ccc; margin: 10px 10px; border-radius: 20px;" type="text" class="form-control" id="form_rastreio" name="rastreio" >
				                    	</div>
					                    
					                    <div id="div_label">
					                    	
					                    	<input type="hidden" class="form-control" id="form_order" name="idPedido" value=<?php echo $id_cons ?> >
					                      	<input class="btn btn-success" type="submit" value="Despachar Pedido" id="enviar">
					                      	
					                    </div>
					                    </form>	
			                   		</div>
								
								<?php
									}
								?>
								
								<?php
									if($row_pedido[8] >= 7){
								?>
								
									<div style="float: left; width: 100%">
									<h4>Despache:</h4>
			                    	<hr class="hr3">
			                    	</div>
			                   		<div id="div_itens">
			                   			<form action="despachar_pedido.php" method="post">	                   	
					                    <div id="div_label">
					                        <h5>Tipo de Entrega:</h5> 
					                        <label id="tipo_entrega"><?php echo $row_pedido[9];?></label>
					                    </div>
					                    
					                   
				                        <div id="div_label">
				                        	<h5>Código de rastreio:</h5> 
				                        	<label id="rastreio"><?php echo $row_pedido[1];?></label>
				                    	</div>
					                    
					                    
					                    </form>	
			                   		</div>
								
								<?php
									}
								?>
								
								<?php 
									if($row_pedido[8] > 5){
								?>
									<div style="float: left; width: 100%">
									<h4>Pagamento:</h4>
			                    	<hr class="hr3">
			                    	</div>
			                   		<div id="confirmar_pagamento">
			                   			
				                   		<div id="div_label">
					                        <h5>Tipo de pagamento:</h5> 
					                        <label id="tipo_pagamento"><?php echo $row_pedido[10];?></label>
					                    </div>					    
					                    <div id="div_label">
					                        <h5>Total:</h5> 
					                        <label id="total">R$ <?php echo $row_pedido[11];?></label>
					                    </div>
					                    <div id="div_label">
					                        <h5>Parcelas:</h5> 
					                        <label id="parcela"><?php echo $row_pedido[7];?></label>
					                    </div>

			                   		</div>
			                   			
		                   		<?php 
									}
								?>
								
			                  	<div id="div_itens">
		                    		<h4>Itens:</h4>
		                    		<hr class="hr3">
		                    		<div id="tabela_it" style="padding-right: 100px;">
									<table data-role="table" class="table table-striped" id="table-1">
										<thead>
											<tr>
												<th scope="col">Nome</th>
												<th scope="col">Quantidade</th>
												<th scope="col">Preço</th>
												<th scope="col">Entrega</th>
											</tr>
										</thead>
										<tbody>
											<?php
												while($row_produto = mysqli_fetch_row($resultado_produto)){
											?>
											<tr>
												<td><?php echo $row_produto[26]; ?></td>
												<td><?php echo $row_produto[6]; ?></td>
												<td><?php echo $row_produto[3]; ?></td>
												<td><?php echo $row_produto[4]; ?></td>
											</tr>
											<?php
											}?>
										</tbody>
									</table>
									<br>
		                   			<br>
		                   		</div>
		                   		</div>
		                   		
		                   			
		                   		
		                   		<?php 
									if($row_pedido[8] == 4){
								?>
									<div style="float: left; width: 100%">
									<h4>Pagamento:</h4>
			                    	<hr class="hr3">
			                    	</div>
			                   		<div id="confirmar_pagamento">
			                   			
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
					                    <div id="div_label">
					                    	<form action="confirmar_pagamento.php" method="post">
					                    		<input type="hidden" class="form-control" id="form_order" name="idOrder" value=<?php echo $id_cons ?> >
					                      		<input class="btn btn-success" type="submit" value="Confirmar Pagamento" id="enviar">
					                      	</form>
					                    </div>
			                   		</div>
			                   			
		                   		<?php 
									}
								?>
		                   		
		                   		
		                   		<?php 
									if($row_pedido[8] == 5){
								?>
			                   		<div id="div_nfe">
			                   			<h4>Nota Fiscal:</h4>
			                    		<hr class="hr3">
			                    		<form action="faturar_pedido.php" method="post">
				                    		<div id="div_label">
					                        	<h5>Número de serie:</h5>
					                        	<input style="width: 70%; border: 1px solid #ccc; margin: 10px 10px; border-radius: 20px;" type="text" class="form-control" id="form_numS_nf" name="numSerieNf" >
					                    	</div>
					                    	<div id="div_label">
					                        	<h5>Número:</h5> 
					                        	<input style="width: 70%; border: 1px solid #ccc; margin: 10px 10px; border-radius: 20px;" type="text" class="form-control" id="form_numero_nf" name="numeroNf" >
					                    	</div>
					                    	<div id="div_label">
					                        	<h5>Chave:</h5> 
					                        	<input style="width: 70%; border: 1px solid #ccc; margin: 10px 10px; border-radius: 20px;" type="text" class="form-control" id="form_chave_nf" name="chaveNf" >
					                    	</div>
					      
					                    	<div id="div_label">
					                         	<input type="hidden" class="form-control" id="form_order" name="idOrder" value=<?php echo $id_cons ?> >
					                        	<input class="btn btn-success" type="submit" value="Faturar Pedido" id="enviar">
					                    	</div>
				                    	</form>
			                   		</div>
		                   		<?php 
									}
								?>
		                   		
								
								<?php 
									}else{
								?>
									<div id="div_itens">
			                    		<h4>Itens:</h4>
			                    		<hr class="hr3">
			                    		<div id="tabela_it" style="padding-right: 100px;">
			                    		<?php
			                    		$result_produto2 = "SELECT * FROM cotacao INNER join produto on cotacao.produto_id = produto.id inner join pedido on cotacao.pedido_id = pedido.id WHERE pedido.id = $id_cons";
			                    		$resultado_produto2 = mysqli_query($conexao, $result_produto2);
										?>
										<table data-role="table" class="table table-striped" id="table-1">
											<thead>
												<tr>
													<th scope="col">Nome</th>
													<th scope="col">Quantidade</th>
												</tr>
											</thead>
											<tbody>
												<?php
												while($row_produto2 = mysqli_fetch_row($resultado_produto2)){
												?>
												<tr>
													<td><?php echo $row_produto2[7]; ?></td>
													<td><?php echo $row_produto2[1]; ?></td>
												</tr>
												<?php
													}
												?>
											</tbody>
										</table>
										<br>
			                   			<br>
			                   		</div>
			                   		</div>
			                   		<?php
										if($row_pedido[8] < 3) {
									?>
			                   		<div id="div_label" style="padding-left: 80%;">
			                   			<a href="price.php?idPedido=<?php echo $id_cons ?>"><button type="button" class="btn btn-success">Criar Cotação</button></a>
			                   		</div>
									<?php 
										}
		                   			?>
			                   		
									
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