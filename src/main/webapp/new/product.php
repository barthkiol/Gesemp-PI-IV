<?php
	
	session_start();
	include('../verifica_login.php');
	include_once("config.php");

	$result_categoria = "SELECT * FROM categoria";
	$resultado_categoria = mysqli_query($conexao, $result_categoria);
?>

<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="produto.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
	<link rel="icon" href="../gesempLogo1offName.png">
	

	
<meta charset="utf-8">
<title>Novo Produto</title>
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
		                <li><a href="../orders.php">PEDIDOS</a></li>
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
						<h1>Novo Produto</h1>
						<hr class="hr3">
						<div class="box" id="form">
							<form action="cadastro_produto.php" method="POST" id="formulario">
								<fieldset>
									<?php 
									if(isset($_SESSION['status_cadastro'])):
									?>
									<div id="sucesso" class="alert alert-success" role='alert'>
										<p>Produto criado com sucesso!</p>
									</div>
									<?php
									endif;
									unset($_SESSION['status_cadastro']);
									?>
									<div class="inputBox">
										<label for="form_nome">Nome do produto</label>
										<input type="text" class="form-control" id="form_nome" placeholder="Nome" name="nome" required>
										<br>
									</div>
									<div class="inputBox">
										<label for="form_sku">SKU do produto</label>
										<input type="text" class="form-control" id="form_sku" placeholder="SKU" name="sku" required>
										<br>
									</div>
									<div class="inputBox">
										<label for="form_ean">EAN do produto</label>
										<input type="text" class="form-control" id="form_ean" placeholder="EAN" name="ean" required>
										<br>
									</div>
									<div class="form-group">
										<label for="form_des">Descrição do produto</label>
										<textarea class="form-control" id="form_des" placeholder="Descrição" rows="3" name="descricao" required></textarea>
									</div>
									<div class="inputBox">
										<label for="form_categoria">Categoria do produto</label>
										<select class="form-control" id="form_categoria" name="categoria" required="required">
											<option>Categoria</option>
											<?php
												while($row_categoria = mysqli_fetch_row($resultado_categoria)){
											?>
											<option value="<?php echo $row_categoria[0]; ?>"><?php echo $row_categoria[1]; ?></option>
											<?php 
												}
											?>
										</select>
										<br>
									</div>
																	
									<br>
									<div id="botao">
										<input class="btn btn-success" type="submit" value="Criar" id="enviar">
									</div>
								</fieldset>
							</form>
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