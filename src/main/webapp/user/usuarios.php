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
	</style>
<meta charset="utf-8">
<title>Usuários</title>
</head>

<body>
	<div id="pagina">
	    
	    
	        <!-- Barra de atalhos lateral -->
	        <div id="sidebar-pagina">
		        <br>
		        <div id="logo-side" style="padding-right= 50px;">
		        	 <a href="../home.php"><img src="gesempLogo1.png" alt="Image" height="130" width="200"></a>
		        </div>
		       <h6 style="color: white; padding-left: 15px;">Olá, <?php echo $_SESSION['nomeuser'];?></h6>
		        <br>
		            <ul class="sidebar-nav">
		                <li><a href="../products/produtos.php">PRODUTOS</a></li>
		                <li><a href="../order/orders.php">PEDIDOS</a></li>
		                <li><a href="../category/categorias.php">CATEGORIAS</a></li>
		                <li><a href="usuarios.php">USÚARIOS</a></li>
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
	                        <h2>Usuários</h2>
	                        
	                        <br>
	                        
	                        <h3>Fornecedores</h3>
	                        <hr class="hr3">
	                        <div id="tabela" style="padding-right: 70px; padding-left: 30px; width: 75%">
				                <?php
									include_once "config.php";
		
									//consultar no banco
									$result_fornecedor = "SELECT * FROM fornecedor";															
									$resultado_fornecedor = mysqli_query($conexao, $result_fornecedor);

									//verificar se encontrou algo
									if(($resultado_fornecedor) and ($resultado_fornecedor->num_rows !=0)){
	
								?>  	
			                    <br>
								<table class="table table-striped" id="tabelaprodutos">
									<thead class="thead-light">
										<tr>
											<th scope="col">Id</th>
											<th scope="col">Nome</th>
											<th scope="col">Email</th>
											<th scope="col"></th>
										</tr>
									</thead>
									<tbody>
										<?php
											while($row_fornecedor = mysqli_fetch_row($resultado_fornecedor)){
										?>
											<tr>
												<td><?php echo $row_fornecedor[0]; ?></td>
												<td><?php echo $row_fornecedor[3]; ?></td>
												<td><?php echo $row_fornecedor[1]; ?></td>
												<td><a href="produto.php?idProduto=<?php echo $row_fornecedor[0]; ?>"><button type="button" class="btn btn-link">Ver</button></a></td>
											</tr>
											<?php
											}?>
									</tbody>
								</table>
								<br>
								<br>		                    
			                    <?php
									}else{
										echo "<div class='alert alert-danger' role='alert'>Nenhum fornecedor encontrado!</div>";
									}
								?>		                    
			                   	<button type="button" class="btn btn-success">Novo Forncedor</button>		          
			                    <br>                  
		                    </div>
		                    
		                    <br><br>
		                    <h3>Gerentes</h3>
	                        <hr class="hr3">
	                        <div id="tabela" style="padding-right: 70px; padding-left: 30px; width: 75%"> 
				                <?php
									include_once "config.php";
		
									//consultar no banco
									$result_gerente = "SELECT * FROM gerente";															
									$resultado_gerente = mysqli_query($conexao, $result_gerente);

									//verificar se encontrou algo
									if(($resultado_gerente) and ($resultado_gerente->num_rows !=0)){
	
								?>  	
			                    <br>
								<table class="table table-striped" id="tabelaprodutos">
									<thead class="thead-light">
										<tr>
											<th scope="col">Id</th>
											<th scope="col">Nome</th>
											<th scope="col">Email</th>
											<th scope="col"></th>
										</tr>
									</thead>
									<tbody>
										<?php
											while($row_gerente = mysqli_fetch_row($resultado_gerente)){
										?>
											<tr>
												<td><?php echo $row_gerente[0]; ?></td>
												<td><?php echo $row_gerente[2]; ?></td>
												<td><?php echo $row_gerente[1]; ?></td>
												<td><a href="produto.php?idProduto=<?php echo $row_gerente[0]; ?>"><button type="button" class="btn btn-link">Ver</button></a></td>
											</tr>
											<?php
											}?>
									</tbody>
								</table>
								<br>
								<br>		                    
			                    <?php
									}else{
										echo "<div class='alert alert-danger' role='alert'>Nenhum gerente encontrado!</div>";
									}
								?>		                    
			                    <button type="button" class="btn btn-success">Novo Gerente</button>		          
			                    <br>          
		                    </div>
		                    
		                    <br><br>
		                    <h3>Aprovador</h3>
	                        <hr class="hr3">
	                        <div id="tabela" style="padding-right: 70px; padding-left: 30px; width: 75%"> 
				                <?php
									include_once "config.php";
		
									//consultar no banco
									$result_aprovador = "SELECT * FROM aprovador";															
									$resultado_aprovador = mysqli_query($conexao, $result_aprovador);

									//verificar se encontrou algo
									if(($resultado_aprovador) and ($resultado_aprovador->num_rows !=0)){
	
								?>  	
			                    <br>
								<table class="table table-striped" id="tabelaprodutos">
									<thead class="thead-light">
										<tr>
											<th scope="col">Id</th>
											<th scope="col">Nome</th>
											<th scope="col">Email</th>
											<th scope="col"></th>
										</tr>
									</thead>
									<tbody>
										<?php
											while($row_aprovador = mysqli_fetch_row($resultado_aprovador)){
										?>
											<tr>
												<td><?php echo $row_aprovador[0]; ?></td>
												<td><?php echo $row_aprovador[2]; ?></td>
												<td><?php echo $row_aprovador[1]; ?></td>
												<td><a href="produto.php?idProduto=<?php echo $row_aprovador[0]; ?>"><button type="button" class="btn btn-link">Ver</button></a></td>
											</tr>
											<?php
											}?>
									</tbody>
								</table>
								<br>
								<br>		                    
			                    <?php
									}else{
										echo "<div class='alert alert-danger' role='alert'>Nenhum aprovador encontrado!</div>";
									}
								?>		                    
			                    <button type="button" class="btn btn-success">Novo Aprovador</button>		          
			                    <br> 	                    
		                    </div>
		                    
		                    <br><br>
		                    <h3>Comprador</h3>
	                        <hr class="hr3">
	                        <div id="tabela" style="padding-right: 70px; padding-left: 30px; width: 75%"> 
				                <?php
									include_once "config.php";
		
									//consultar no banco
									$result_comprador = "SELECT * FROM comprador";															
									$resultado_comprador = mysqli_query($conexao, $result_comprador);

									//verificar se encontrou algo
									if(($resultado_comprador) and ($resultado_comprador->num_rows !=0)){
	
								?>  	
			                    <br>
								<table class="table table-striped" id="tabelaprodutos">
									<thead class="thead-light">
										<tr>
											<th scope="col">Id</th>
											<th scope="col">Nome</th>
											<th scope="col">Email</th>
											<th scope="col"></th>
										</tr>
									</thead>
									<tbody>
										<?php
											while($row_comprador = mysqli_fetch_row($resultado_comprador)){
										?>
											<tr>
												<td><?php echo $row_comprador[0]; ?></td>
												<td><?php echo $row_comprador[2]; ?></td>
												<td><?php echo $row_comprador[1]; ?></td>
												<td><a href="produto.php?idProduto=<?php echo $row_comprador[0]; ?>"><button type="button" class="btn btn-link">Ver</button></a></td>
											</tr>
											<?php
											}?>
									</tbody>
								</table>
								<br>
								<br>		                    
			                    <?php
									}else{
										echo "<div class='alert alert-danger' role='alert'>Nenhum comprador encontrado!</div>";
									}
								?>		                    
			                   <button type="button" class="btn btn-success">Novo Comprador</button>		          
			                    <br>  	
			                    <br> <br> 		                    
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