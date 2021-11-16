<?php 
		
		session_start();

		include_once('config.php');


		$idc = mysqli_real_escape_string($conexao, $_POST['idc']);
		$idp = mysqli_real_escape_string($conexao, $_POST['idp']);
		$quantidade = mysqli_real_escape_string($conexao, $_POST['qnt']);
		
		echo "ID comprador: " . $idc . " Id produto: " . $idp . " Quantidade: " . $quantidade;
		$result_salvarCart = "INSERT INTO `carrinho` (`produto_id`, `quantidade`, `comprador_id`) VALUES ('$idp', '$quantidade', '$idc')";
		$resultado_salvarCart = mysqli_query($conexao, $result_salvarCart);

		if($resultado_salvarCart == 1){
			$_SESSION['cart_add'] = true;
		
		}
		
		$conexao->close();
		
		header('Location: new.php');
		exit;
		?>