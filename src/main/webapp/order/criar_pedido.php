<?php
	session_start();

	include('config.php');
	
	//Criando o pedido
	$hoje = date('d/m/Y');
	$status = 1;
	$idc = $_SESSION['iduser'];
	$numPedido = mysqli_real_escape_string($conexao, $_POST['numPedido']);
	
	$result_pedido = "INSERT INTO `pedido` (`data`, `numPedido`, `status`, `comprador_id`) VALUES ('$hoje', '$numPedido', '$status', '$idc')";
	$resultado_pedido = mysqli_query($conexao, $result_pedido);
	echo $result_pedido;

	if($resultado_pedido == true){

		//pegando o ID do pedido criado
		$retorna_id_pedido ="SELECT pedido.id FROM pedido where pedido.numPedido = $numPedido";
		$resultado_id_pedido = mysqli_query($conexao, $retorna_id_pedido);
		$row_id_pedido = mysqli_fetch_row($resultado_id_pedido);
		echo "Criou o pedido linha 20    ";
		echo $retorna_id_pedido;

		if($resultado_id_pedido == true){
			//Inserir os dados de produto e pedido na cotacao
			$result_cotacao = "INSERT INTO cotacao (quantidade, produto_id, pedido_id) SELECT carrinho.quantidade, carrinho.produto_id, $row_id_pedido[0] FROM carrinho";
			$resultado_cotacao = mysqli_query($conexao, $result_cotacao);
			echo "Criou cotacao linha 25    ";
			echo $result_cotacao;

			if($resultado_cotacao == true){
				//Limpar o carrinho
				$result_clean_cart = "DELETE FROM `carrinho` WHERE `carrinho`.`comprador_id` = $idc";
				$resultado_clean_cart = mysqli_query($conexao, $result_clean_cart);
				echo "Limpo Carrinho linha 30    ";
				echo $result_clean_cart;
	
				//pedido criado
				echo "Criou sessão linha 35  ";
				$_SESSION['pedido_criado'] = true;				
				header('Location: new.php');
				

			}else {
				$_SESSION['pedido_criado'] = false;				
				header('Location: new.php');
			}

		}else {
			$_SESSION['pedido_criado'] = true;				
			header('Location: new.php');
		}

	}else {
		$_SESSION['pedido_criado'] = true;				
		header('Location: new.php');
	}
	
	


	?>
