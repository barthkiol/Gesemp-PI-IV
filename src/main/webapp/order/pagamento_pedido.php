<?php

	session_start();
	include('../verifica_login.php');
	include_once("config.php");
	
	$entrega = mysqli_real_escape_string($conexao, $_POST['tipoEntrega']);
	$pagamento = mysqli_real_escape_string($conexao, $_POST['tipoPagamento']);
	$parcelas = mysqli_real_escape_string($conexao, $_POST['parcelas']);
	$idPedido = mysqli_real_escape_string($conexao, $_POST['idOrder']);
	
	$result_alter_pedido = "UPDATE `pedido` SET `parcelas` = '$parcelas', `status` = '4', `tipoDeEntrega` = '$entrega', `tipoDePagamento` = '$pagamento' WHERE `pedido`.`id` = $idPedido";
	$resultado_alter_pedido = mysqli_query($conexao, $result_alter_pedido);
	
	$_SESSION['pedido_atualizado'] = true;
	header('Location: pedido.php?idPedido='.$idPedido);
	
	?>