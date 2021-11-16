<?php
		session_start();

		include_once('config.php');

		$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
		$descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
		$ean = mysqli_real_escape_string($conexao, $_POST['ean']);
		$sku = mysqli_real_escape_string($conexao, $_POST['sku']);
		$categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);
		
		
		$result_novoProd = "INSERT INTO PRODUTO (descricao, ean, nome, sku, categoria_id) values ('$descricao', '$ean', '$nome', '$sku', '$categoria') ";
		$result_novoProduto = mysqli_query($conexao, $result_novoProd);
		
		if($result_novoProduto == 1){
			$_SESSION['status_cadastro'] = true;
		
		}
		
		$conexao->close();
		
		header('Location: product.php');
		exit;
	?>