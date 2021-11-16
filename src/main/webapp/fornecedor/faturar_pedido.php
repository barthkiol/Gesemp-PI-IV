<?php

	session_start();
	include('../verifica_login.php');
	include_once("config.php");
	
	$idPedido = mysqli_real_escape_string($conexao, $_POST['idOrder']);
	$serieNf = mysqli_real_escape_string($conexao, $_POST['numSerieNf']);
	$numeroNf = mysqli_real_escape_string($conexao, $_POST['numeroNf']);
	$chaveNf = mysqli_real_escape_string($conexao, $_POST['numeroNf']);
	
	$result_alter_pedido = "UPDATE `pedido` SET  `nfKey` = '$chaveNf', `nfNumber` = '$numeroNf', `nfSerial` = '$serieNf', `status` = '6' WHERE `pedido`.`id` = $idPedido";
	$resultado_alter_pedido = mysqli_query($conexao, $result_alter_pedido);
	
	$_SESSION['pedido_atualizado'] = true;
	header('Location: pedido.php?idPedido='.$idPedido);
	
	?>