""<?php

	
		session_start();

		include_once('config.php');


		$id = filter_input(INPUT_GET, 'idCategoria', FILTER_SANITIZE_NUMBER_INT);
		$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
		$categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);
		
		$nome = strtoupper($nome);
		if($categoria == null){
			$result_altCate = "UPDATE `categoria` SET `nome_categoria` = '$nome'  WHERE `categoria`.`id` = $id";
		}else{
			$result_altCate = "UPDATE `categoria` SET `nome_categoria` = '$nome', `categoria_id` = '$categoria' WHERE `categoria`.`id` = $id";
		}
		
		
		$result_altCategoria = mysqli_query($conexao, $result_altCate);
		
		echo $result_altCate;
		if($result_altCategoria == 1){
			$_SESSION['status_alterado'] = true;
		
		}
		
		$conexao->close();
		
		header('Location: categorias.php');
		exit;
	?>