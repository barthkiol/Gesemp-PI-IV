<?php

	session_start();
	include('../verifica_login.php');
	include_once("config.php");
	
	$id_parcEnt = 0;
	$id_entregue = 0;
	$id_cancel = 0;
	
	$idPedido = mysqli_real_escape_string($conexao, $_POST['idOrder']);
	$id_parcEnt = filter_input(INPUT_GET, 'idParc', FILTER_SANITIZE_NUMBER_INT);
	$id_entregue = filter_input(INPUT_GET, 'idEntregue', FILTER_SANITIZE_NUMBER_INT);
	$id_cancel = filter_input(INPUT_GET, 'idCancel', FILTER_SANITIZE_NUMBER_INT);


	if($id_parcEnt != 0){
		//PARCIALMENTE ENTREGUE
		$result_alter_pedido = "UPDATE `pedido` SET `status` = '9' WHERE `pedido`.`id` = $idPedido";
		$resultado_alter_pedido = mysqli_query($conexao, $result_alter_pedido);
		
		$_SESSION['pedido_atualizado'] = true;
		header('Location: pedido.php?idPedido='.$idPedido);
	}
	
	if($id_entregue != 0){
		//ENTREGUE
		$result_alter_pedido = "UPDATE `pedido` SET `status` = '8' WHERE `pedido`.`id` = $idPedido";
		$resultado_alter_pedido = mysqli_query($conexao, $result_alter_pedido);
		
		$_SESSION['pedido_atualizado'] = true;
		header('Location: pedido.php?idPedido='.$idPedido);
	}
	
	if($id_cancel != 0){
		//CANCELADO
		$result_alter_pedido = "UPDATE `pedido` SET `status` = '10' WHERE `pedido`.`id` = $idPedido";
		$resultado_alter_pedido = mysqli_query($conexao, $result_alter_pedido);
		
		$_SESSION['pedido_atualizado'] = true;
		header('Location: pedido.php?idPedido='.$idPedido);
	}
	
	
	?>