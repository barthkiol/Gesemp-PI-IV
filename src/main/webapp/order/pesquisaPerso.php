<?php              
	include_once("config.php");
	//$pagina = 1;
	//$qnt_result_pg = 5;

	//$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;
	
	$nomes = $_POST['palavra'];

	//consultar no banco
	$result_produto = "SELECT * FROM produto inner join categoria on produto.categoria_id = categoria.id where produto.nome LIKE '%$nomes%' ";
	//$result_produto .= " $cWhere_final ";
	//$result_produto .= " LIMIT $inicio, $qnt_result_pg";
	$resultado_produto = mysqli_query($conexao, $result_produto);

	//verificar se encontrou algo
	if(mysqli_num_rows($resultado_produto) <= 0 ){
		echo "Nenhum produto encontrado...";
	}else{
		while($row_produto = mysqli_fetch_row($resultado_produto)){
			echo "<td class='col-xs-1 col-sm-1 col-md-1 col-lg-1'>"$row_produto[0]"</td>"
			echo "<td class='col-xs-2 col-sm-2 col-md-2 col-lg-2'>"$row_produto[3]"</td>"
			echo "<td class='col-xs-2 col-sm-2 col-md-2 col-lg-2'>" $row_produto[8]"</td>"
			
		}
		
	}
	
?>