<?php

	session_start();
	include('../verifica_login.php');
	include_once("config.php");
	
	$idForn = mysqli_real_escape_string($conexao, $_POST['idForn']);
	$idOrder = mysqli_real_escape_string($conexao, $_POST['idOrder']);
	$idAprovador = mysqli_real_escape_string($conexao, $_POST['idAprovador']);
	
	 
	
	$result_salva_cotOrd = "DELETE c FROM `cotacao_fornecedor` c INNER JOIN cotacao on c.cotacao_id = cotacao.id inner JOIN pedido on cotacao.pedido_id = pedido.id INNER JOIN fornecedor on c.fornecedor_id = fornecedor.id inner JOIN produto on cotacao.produto_id = produto.id where pedido.id = $idOrder and fornecedor.id != $idForn;";
	$resultado_salva_cotOrd = mysqli_query($conexao, $result_salva_cotOrd);
	
	$result_total_order = "SELECT SUM(c.preco) FROM cotacao_fornecedor c INNER JOIN cotacao on c.cotacao_id = cotacao.id inner JOIN pedido on cotacao.pedido_id = pedido.id INNER JOIN fornecedor on c.fornecedor_id = fornecedor.id inner JOIN produto on cotacao.produto_id = produto.id where pedido.id = $idOrder and fornecedor.id = $idForn;";
	$resultado_total_order =  mysqli_query($conexao, $result_total_order);
	$row_total = mysqli_fetch_row($resultado_total_order);
	$totalPedido = $row_total[0];
	
	$result_att_order = "UPDATE `pedido` SET `status` = '3', `total` = '$totalPedido', `aprovador_id` = $idAprovador WHERE `pedido`.`id` = $idOrder";
	$resultado_att_order = mysqli_query($conexao, $result_att_order);
	
	$_SESSION['pedido_atualizado'] = true;
	header('Location: pedido.php?idPedido='.$idOrder);
?>