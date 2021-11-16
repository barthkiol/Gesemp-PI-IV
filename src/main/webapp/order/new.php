<?php
	session_start();
	include('../verifica_login.php');
	include_once("config.php");
?>



<!DOCTYPE html>
<html>

<head>
 
	
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="novo_pedido.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <link rel="icon" href="../gesempLogo1offName.png">
    
    <style type="text/css">
    	#tabelaProduto tr:hover td{
		  background-color: #feffb7;
		}
		
		#tabelaProduto tr.selecionado td{
		  background-color: #aff7ff;
		}
    </style>
    
<meta charset="utf-8">
<title>Novo Pedido</title>
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
		                <li><a href="../products/produtos.php">PRODUTOS</a></li>
		                <li><a href="orders.php">PEDIDOS</a></li>
		                <li><a href="../category/categorias.php">CATEGORIAS</a></li>
		                <li><a href="../user/usuarios.php">USU?RIOS</a></li>
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
                        <h1>Novo Pedido</h1>
                        <hr class="hr3">
                        <?php 
							if(isset($_SESSION['pedido_criado'])):
						?>
						<div id="sucesso" class="alert alert-success" role='alert'>
							<p>Pedido criado com sucesso!</p>
						</div>
						<?php
							endif;
							unset($_SESSION['pedido_criado']);
						?> 
                        <h3>Lista Itens</h3>
                        <form action="" method="POST" id="formulario">
								<fieldset>
									<div  id="div_label_f" class="inputBox">
										<label for="form_id">ID</label>
										<input type="search" class="form-control" id="form_id" placeholder="Id" name="id" >
										<br>
									</div>
									<div id="div_label" class="inputBox">
										<label for="form_nome">Nome</label>
										<input type="search" class="form-control" id="form_nome" placeholder="Nome" name="nome" >
										<br>
									</div>
									<div id="div_label" class="form-group">
									    <label for="form_categoria">Categoria</label>
									    <select class="form-control"  id="form_categoria" name="categoria">
									    	<option>Categoria</option>
									  		<?php
												$result_categoria = "SELECT * FROM categoria";
												$resultado_categoria = mysqli_query($conexao, $result_categoria);
												while($row_categoria = mysqli_fetch_assoc($resultado_categoria)){ ?>
												<option value="<?php echo $row_categoria['id']; ?>"><?php echo $row_categoria['nome_categoria'];?>
												</option> <?php
												}
											?>
									    </select>
									  </div>
									<div id="buscar">
										<input id="filtro" type="submit" name="pesquisar" class="btn btn-secondary" value="Buscar">
									</div>
									
								</fieldset>
							</form> 
						<div id="tabela">    
							                              
							<script>
								var qnt_result_pg = 5;
								var pagina = 1;
								$(document).ready(function () {
									consultar_produto (pagina, qnt_result_pg);
								});

								function consultar_produto (pagina, qnt_result_pg){
									var dados = {
											pagina: pagina,
											qnt_result_pg: qnt_result_pg
									}
									
									$.post('consulta_produto.php', dados, function(retorna){
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
        $("#sidebar-toggle").click( function (e){
            e.preventDefault();
            $("#pagina").toggleClass("menuDisplayed");
        });

    </script>


</body>

</html>