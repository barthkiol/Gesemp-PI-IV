<?php 
		
		session_start();

		include_once('config.php');

		$idc = $_SESSION['iduser'];;
		$idp = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
		
		
		echo "ID comprador: " . $idc . " Id produto: " . $idp;
		$result_removeCart = "DELETE FROM `carrinho` WHERE `carrinho`.`produto_id` = $idp and carrinho.comprador_id = $idc";
		$resultado_removeCart = mysqli_query($conexao, $result_removeCart);

		if($resultado_removeCart == 1){
			$_SESSION['cart_remove'] = true;
		
		}
		
		$conexao->close();
		
		header('Location: new.php');
		exit;
		?>