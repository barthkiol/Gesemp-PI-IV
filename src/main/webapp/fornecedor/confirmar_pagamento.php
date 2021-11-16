<?php

	session_start();
	include('../verifica_login.php');
	include_once("config.php");
	
	$idPedido = mysqli_real_escape_string($conexao, $_POST['idOrder']);
	
	$result_alter_pedido = "UPDATE `pedido` SET  `status` = '5' WHERE `pedido`.`id` = $idPedido";
	$resultado_alter_pedido = mysqli_query($conexao, $result_alter_pedido);
	
	$_SESSION['pedido_atualizado'] = true;
	header('Location: pedido.php?idPedido='.$idPedido);
	
	?>