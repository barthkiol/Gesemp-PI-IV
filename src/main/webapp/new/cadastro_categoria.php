<?php
		session_start();

		include_once('config.php');

		$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
		$categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);
		

		$nome = strtoupper($nome);
		if($categoria == 0){
			$categoria = "null";
		}
		$result_novoCate = "INSERT INTO `categoria` (`nome_categoria`, `categoria_id`) VALUES ('$nome', $categoria)";
		
		//echo $result_novoCate;
		$result_novoCategoria = mysqli_query($conexao, $result_novoCate);
		
		if($result_novoCategoria == 1){
			$_SESSION['status_cadastro'] = true;
		
		}
		
		$conexao->close();
		
		header('Location: category.php');
		exit;
	?>