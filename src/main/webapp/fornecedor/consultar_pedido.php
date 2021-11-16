<style>
#form_qnt{
	width: 100px;
	float: left;
}

#addDados{
	float: left;
	margin-left: 50px;
}

#botao{
	padding-left: 85%;
}
#pagina.menuDisplayed #botao{
	padding-left: 84%;
}
</style>

<?php
	include_once "config.php";
	session_start();
	
	$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
	$qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
	
	$idForn = $_SESSION['iduser'];

	$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

	
	
	//consultar no banco
	$result_pedido = "SELECT * FROM `pedido` left join cotacao on cotacao.pedido_id = pedido.id LEFT JOIN cotacao_fornecedor on cotacao_fornecedor.cotacao_id = cotacao.id where pedido.status < 3 or cotacao_fornecedor.fornecedor_id = $idForn GROUP by pedido.id ";
	//$result_pedido .= " $cWhere_final ";
	$result_pedido .= " LIMIT $inicio, $qnt_result_pg";
	$resultado_pedido = mysqli_query($conexao, $result_pedido);

//verificar se encontrou algo
if(($resultado_pedido) and ($resultado_pedido->num_rows !=0)){
	
?>
<br><br>
	<table class="table table-striped" id="tabelaPedidos">
		<thead class="thead-light">
			<tr>
				<th scope="col">Id</th>
				<th scope="col">Data</th>
				<th scope="col">Número do pedido</th>
				<th scope="col">Status</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row_pedido = mysqli_fetch_row($resultado_pedido)){
				?>
				<tr>
					<td><?php echo $row_pedido[0]; ?></td>
					<td><?php echo $row_pedido[2]; ?></td>
					<td><?php echo $row_pedido[6]; ?></td>
					<td><?php echo $row_pedido[8]; ?></td>
					<td><a href="pedido.php?idPedido=<?php echo $row_pedido[0]; ?>"><button type="button" class="btn btn-link">Ver</button></a></td>
				</tr>
				<?php
			}?>
		</tbody>
	</table>
	<br>
	<br>
	
	<div id="paginacao" style="padding-left: 40%">
<?php

$result_pg = "SELECT COUNT(id) AS num_result from pedido";
$resultado_pg = mysqli_query($conexao, $result_pg);
$row_pg = mysqli_fetch_assoc($resultado_pg);

$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

$max_links = 2;

echo '<nav aria-label="paginacao">';
 echo '<ul class="pagination">';
    echo '<li class="page-item">';
	echo "<a class='page-link' href='#' onclick='listar_pedido(1, $qnt_result_pg)'>Primeira </a>";
	echo '</li>';
	for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1;$pag_ant++){
		if($pag_ant >= 1) {
			echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_pedido($pag_ant, $qnt_result_pg)'> $pag_ant </a></li>";
		}
	}
	
	
echo '<li class="page-item active">';
echo '<a class="page-link" href="#">';
echo "$pagina";
echo '</a>';
echo '</li>';

for($pag_pos = $pagina + 1; $pag_pos <= $pagina + $max_links; $pag_pos++){
	if($pag_pos <= $quantidade_pg){
		echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_pedido($pag_pos, $qnt_result_pg)'> $pag_pos </a></li>";
	}
}

echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_pedido($quantidade_pg, $qnt_result_pg)'> Ultima </a></li>";
echo '</ul>';
echo '</nav>';
}else{
	echo "<div class='alert alert-danger' role='alert'>Nenhum pedido encontrado!</div>";
}
?>
</div>