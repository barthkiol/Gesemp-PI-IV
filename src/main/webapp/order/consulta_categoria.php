<?php
	include_once "config.php";
	
	//consultar no banco
	$result_categoria = "SELECT * FROM categoria";
	$resultado_categoria = mysqli_query($conexao, $result_categoria);

//verificar se encontrou algo
if(($resultado_categoria) and ($resultado_categoria->num_rows !=0)){
	while($row_categoria = mysqli_fetch_assoc($resultado_categoria)){
		?>
		<option><?php echo $row_categoria['nome']; ?></option>
		<?php 
	}
}
		
?>

