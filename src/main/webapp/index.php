<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="pedido.css">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
	    <link rel="icon" href="gesempLogo1offName.png">
		<title>Gesemp</title>
	</head>

	<style>
		*{margin:0;padding:0;box-sizing:border-box;}
		
		body{
			background-color: white;
		}
		
		form{
			background-color: #6495ED;
			max-width: 500px;
			width: 60%;
			padding: 20px;
			position: absolute;
			left: 50%;
			top: 50%;
			transform: translate(-50%, -50%);
			border-radius: 20px;
		}
		form h3{
			text-align: center;
			color: white;
			font-family: 'Lucida Sans'
		}
		
		form input[type=text],
		form input[type=password]{
			width: 100%;
			height: 45px;
			border: 1px solid #ccc;
			padding-left: 10px;
			margin: 10px 0;
			border-radius: 20px;
		}
		
		form input[type=submit]{
			display: block;
    		margin: auto;
			width: 30%;
			height: 30px;
			cursor: pointer;
			background: ;
			color: #6495ED;
			border: 0;
			border-radius: 20px;
			font-family: 'Lucida Sans';
			font-size: 16px;
			
		}
		
		#logo-main{
			max-width: 500px;
			width: 60%;
			padding: 20px;
			left: 45%;
			top: 24%;
			transform: translate(-50%, -50%);
			position: absolute;
		}
		#erro{
			max-width: 500px;
			width: 60%;
			padding: 20px;
			position: absolute;
			left: 50%;
			top: 73%;
			transform: translate(-50%, -50%);
		}
	</style>


	<body>
	
		<div id="logo-main">
	        	 <img src="gesempLogo1.png" alt="Image" >
	    </div>
		<form action="login.php" method="POST">
			<h3>Login</h3>
			<input type="text" name="email" placeholder="Digite seu E-mail..." >
			<input type="password" name="senha" placeholder="Digite sua senha...">
			<input type="submit" name="logar" value="Entrar">
		</form>
		<?php 
			if(isset($_SESSION['nao_autenticado'])):
		?>
		<div id="erro" class='alert alert-danger' role='alert'>
			<p>Usuário ou senha inválidos. Tente Novamente!</p>
		</div>
		<?php
			
			endif;

			unset($_SESSION['nao_autenticado']);
		?>
	</body>


</html>