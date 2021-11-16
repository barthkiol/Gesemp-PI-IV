<?php
	
	session_start();

	include('config.php');

	$idFornecedor = $_SESSION['iduser'];
	
	$linhas = mysqli_real_escape_string($conexao, $_POST['linhas']);
	
	for($i = 0; $i < $linhas; $i++){

		$cotPost = "cotacao_" . $i;
		$cotacao = mysqli_real_escape_string($conexao, $_POST[$cotPost]);


		$entregaPost = "entrega_" . $i;
		$entrega = mysqli_real_escape_string($conexao, $_POST[$entregaPost]);
		
		$idCotPost = "id_" . $i;
		$idCot = mysqli_real_escape_string($conexao, $_POST[$idCotPost]);


		echo $cotacao;
		echo $entrega;
		echo $idCot;
		echo $idFornecedor;
		$result_cotForn = "INSERT INTO `cotacao_fornecedor` (`fornecedor_id`, `cotacao_id`, `preco`, `entrega`) VALUES ('$idFornecedor', '$idCot', '$cotacao', '$entrega');";
		$resultado_cotForn = mysqli_query($conexao, $result_cotForn);
		echo $result_cotForn;
	}
	
	
	echo $linhas;
	$_SESSION['cotacao_criada'] = true;				
	header('Location: orders.php');
	?>
	
	
	
	