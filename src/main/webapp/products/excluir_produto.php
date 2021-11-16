<?php

	
		session_start();

		include_once('config.php');


		$id = filter_input(INPUT_GET, 'idProduto', FILTER_SANITIZE_NUMBER_INT);
		$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
		$descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
		$ean = mysqli_real_escape_string($conexao, $_POST['ean']);
		$sku = mysqli_real_escape_string($conexao, $_POST['sku']);
		$categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);
		
		
		$result_excProd = "DELETE FROM `produto` WHERE `produto`.`id` = $id";
		$result_excProduto = mysqli_query($conexao, $result_excProd);
		
		//echo $result_excProd;
		if($result_excProduto == 1){
			$_SESSION['status_excluido'] = true;
		
		}
		
		$conexao->close();
		
		header('Location: produtos.php');
		exit;
	?>