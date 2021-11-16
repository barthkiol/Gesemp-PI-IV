<?php

	
		session_start();

		include_once('config.php');


		$id = filter_input(INPUT_GET, 'idProduto', FILTER_SANITIZE_NUMBER_INT);
		$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
		$descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
		$ean = mysqli_real_escape_string($conexao, $_POST['ean']);
		$sku = mysqli_real_escape_string($conexao, $_POST['sku']);
		$categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);
		
		
		$result_altProd = "UPDATE `produto` SET `descricao` = '$descricao', `ean` = '$ean', `nome` = '$nome', `sku` = '$sku', `categoria_id` = '$categoria' WHERE `produto`.`id` = $id ";
		$result_altProduto = mysqli_query($conexao, $result_altProd);
		
		//echo $result_altProd;
		if($result_altProduto == 1){
			$_SESSION['status_alterado'] = true;
		
		}
		
		$conexao->close();
		
		header('Location: produtos.php');
		exit;
	?>