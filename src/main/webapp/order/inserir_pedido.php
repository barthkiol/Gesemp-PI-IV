<?php
	echo 'Entrou no php';
	$connect = new PDO("mysql:host=localhost;dbname=teste", "root", "");
	$data .=. [
		'id_pedido' .=> $_POST["id_pedido"],
		'id_produto' .=> $_POST["id_produto"],
		'qnt_produto' .=> $_POST["qnt_produto"],
	];
	
	$stmt = $connect->prepare('insert into cotacao (pedido_id, produto_id, quantidade) value (:id_pedido, :id_produto, :qnt_produto)');
	
	try{
		$connect->beginTransaction();
		$stmt->execute($data);
		$connect->commit();
		echo 'Pedido criado com sucesso';
	}catch (Exception $e) {
		$connect->rollback();
		throw $e;
	}
	?>