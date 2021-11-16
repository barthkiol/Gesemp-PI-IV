<?php
	
	session_start();
	include('../verifica_login.php');
	include_once("config.php");

	if(isset($_POST['submit']))
	{
		


		include_once('config.php');

		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$telefone = $_POST['telefone']
		$endereco = $_POST['endereco']
		

		$result = mysqli_query($conexao, "INSERT INTO FORNECEDOR (email, endereco, nome, telefone) values ('$email', '$endereco','$nome','$senha') ");

	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="provider.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
	<link rel="icon" href="../gesempLogo1offName.png">
	
<meta charset="utf-8">
<title>Novo Fornecedor</title>

</head>

<body>

	<div id="pagina">
	
	
		<!-- Barra de atalhos lateral -->
		<div id="sidebar-pagina">
		        <br>
		        <div id="logo-side" style="padding-right= 50px;">
		        	 <a href="../home.php"><img src="gesempLogo1.png" alt="Image" height="130" width="200"></a>
		        </div>
		       <h6 style="color: white; padding-left: 15px;">Ol?, <?php echo $_SESSION['nomeuser'];?></h6>
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
						<h1>Novo Fornecedor</h1>
						<hr class="hr3">
						<div class="box" id="form">
							<form action="provider.php" method="POST" id="formulario">
								<fieldset>
									<div class="inputBox">
										<label for="form_fornecedor">Fornecedor</label>
										<input type="text" class="form-control" id="form_forncedor" placeholder="Fornecedor" name="nome" required>
										<br>
									</div>
									<div class="inputBox">
										<label for="form_telefone">Telefone</label>
										<input type="text" class="form-control" id="form_telefone" placeholder="Telefone" name="telefone" required>
										<br>
									</div>
									<div class="inputBox">
										<label for="form_endereco">Endere?o</label>
										<input type="text" class="form-control" id="form_endereco" placeholder="Endereco" name="endereco" required>
										<br>
									</div>
									<div class="inputBox">	
										<label for="form_email">Email</label>
										<input type="email" class="form-control" id="form_email" placeholder="name@email.com" name="email" required>
										<br>
									</div>
									<div class="inputBox">	
										<label for="form_senha">Senha</label>
										<input type="password" class="form-control" id="form_senha" placeholder="Senha" name="senha" required>
										<br>
									</div>
									<div id="botao">
									<input class="btn btn-success" type="submit" name="submit" value="Criar" id="enviar">
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