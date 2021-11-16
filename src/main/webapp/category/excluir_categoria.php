<?php

	
		session_start();

		include_once('config.php');


		$id = filter_input(INPUT_GET, 'idCategoria', FILTER_SANITIZE_NUMBER_INT);
		$categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);
		
		
		$result_excCate = "DELETE FROM `categoria` WHERE `categoria`.`id` = $id";
		$result_excCategoria = mysqli_query($conexao, $result_excCate);
		
		//echo $result_excCate;
		if($result_excCategoria == 1){
			$_SESSION['status_excluido'] = true;
		
		}
		
		$conexao->close();
		
		header('Location: categorias.php');
		exit;
	?>