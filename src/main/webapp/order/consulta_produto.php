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
	session_start();
	include_once "config.php";
	
	$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
	$qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
	
	/*$cWhere = " ";
	$cWhere_final = " ";
	$pesquisar = filter_input(INPUT_POST, 'pesquisar', FILTER_SANITIZE_STRING);
	IF($pesquisar){
		echo "Pesquisar";
		$where_nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
		if(empty($where_nome)){
			
		}else{
			$cWhere .= " produto.nome like '%$where_nome%' ";
		}
		$where_id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
		if(empty($where_id)){
			$cWhere .= " produto.id = '$where_id'";
		}else {
			$cWhere .= " and produto.id = '$where_id'";
		}
		$where_categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_NUMBER_INT);
		if(empty($where_categoria)){
			$cWhere .= " categoria.id = '$where_categoria'";
		}else{
			$cWhere .= " and categoria.id = '$where_categoria'";
		}
		if(empty($cWhere)){
			
		}else{
			$cWhere_final = "where $cWhere";
		}
		
	}*/


	$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

	
	
	//consultar no banco
	$result_produto = "SELECT * FROM produto inner join categoria on produto.categoria_id = categoria.id ";
	//$result_produto .= " $cWhere_final ";
	$result_produto .= " LIMIT $inicio, $qnt_result_pg";
	$resultado_produto = mysqli_query($conexao, $result_produto);

	$idComprador = $_SESSION['iduser'];
	$result_carrinho = "SELECT * FROM `carrinho` inner join produto on carrinho.produto_id = produto.id inner join categoria on produto.categoria_id = categoria.id where comprador_id = $idComprador";
	$resultado_carrinho = mysqli_query($conexao, $result_carrinho);

//verificar se encontrou algo
if(($resultado_produto) and ($resultado_produto->num_rows !=0)){
	
?>
	<div id="addItemQnt">
	
		<form action="salvar_carrinho.php" method="POST" id="addCarrinho">
			<input type="number" class="form-control" id="form_qnt" name="qnt" required>
			<input type="hidden" class="form-control" id="form_idp" name="idp" required>
			<input type="hidden" class="form-control" id="form_idc" name="idc" value=<?php echo $idComprador?> required>
			<button class="btn btn-primary" id="addDados">Adicionar ao carrinho</button>
		</form>
		
	</div>
	<br><br><br>
	<table class="table table-striped" id="tabelaProduto">
		<thead class="thead-light">
			<tr>
				<th scope="col">Id</th>
				<th scope="col">Nome</th>
				<th scope="col">Categoria</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row_produto = mysqli_fetch_row($resultado_produto)){
				?>
				<tr>
					<td><?php echo $row_produto[0]; ?></td>
					<td><?php echo $row_produto[3]; ?></td>
					<td><?php echo $row_produto[8]; ?></td>
				</tr>
				<?php
			}?>
		</tbody>
	</table>
	
	<script>
		var tabela = document.getElementById("tabelaProduto");
		var linhas = tabela.getElementsByTagName("tr");
		for (var i = 0; i < linhas.length; i++){
			var linha = linhas[i];
			linha.addEventListener("click", function(){
				selLinha(this, false);
			});
		}

		function selLinha(linha, multiplos){
			if(!multiplos){
				var linhas = linha.parentElement.getElementsByTagName("tr");
				for( var i = 0; i < linhas.length; i++){
					var linha_ = linhas[i];
					linha_.classList.remove("selecionado");
				}
			}
			linha.classList.toggle("selecionado");
		}

		var btnAdicionar = document.getElementById("addDados");
		
		
				
	</script>
	<br>
<?php

$result_pg = "SELECT COUNT(id) AS num_result from produto";
$resultado_pg = mysqli_query($conexao, $result_pg);
$row_pg = mysqli_fetch_assoc($resultado_pg);

$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

$max_links = 2;

echo '<nav aria-label="paginacao">';
 echo '<ul class="pagination">';
    echo '<li class="page-item">';
	echo "<a class='page-link' href='#' onclick='consultar_produto(1, $qnt_result_pg)'>Primeira </a>";
	echo '</li>';
	for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1;$pag_ant++){
		if($pag_ant >= 1) {
			echo "<li class='page-item'><a class='page-link' href='#' onclick='consultar_produto($pag_ant, $qnt_result_pg)'> $pag_ant </a></li>";
		}
	}
	
	
echo '<li class="page-item active">';
echo '<a class="page-link" href="#">';
echo "$pagina";
echo '</a>';
echo '</li>';

for($pag_pos = $pagina + 1; $pag_pos <= $pagina + $max_links; $pag_pos++){
	if($pag_pos <= $quantidade_pg){
		echo "<li class='page-item'><a class='page-link' href='#' onclick='consultar_produto($pag_pos, $qnt_result_pg)'> $pag_pos </a></li>";
	}
}

echo "<li class='page-item'><a class='page-link' href='#' onclick='consultar_produto($quantidade_pg, $qnt_result_pg)'> Ultima </a></li>";
echo '</ul>';
echo '</nav>';
}else{
	echo "<div class='alert alert-danger' role='alert'>Nenhum produto encontrado!</div>";
}
?>
<br>
<br>

	<h2>Carrinho</h2>
	<hr class="hr3">
	<div id="tabela_cart">
		<table class="table table-striped" id="tabelaCart">
			<thead class="thead-light">
				<tr>
					<th scope="col">Id Produto</th>
					<th scope="col">Nome</th>
					<th scope="col">Categoria</th>
					<th scope="col">Quantidade</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<?php
					while($row_carrinho = mysqli_fetch_row($resultado_carrinho)){
				?>
				<tr>
					<td><?php echo $row_carrinho[1]; ?></td>
					<td><?php echo $row_carrinho[7]; ?></td>
					<td><?php echo $row_carrinho[12]; ?></td>
					<td><?php echo $row_carrinho[2]; ?></td>
					<td><form action="remove_cart.php?id=<?php echo $row_carrinho[1]; ?>" method="POST" id="remove_cart"><button class='btn btn-danger' onclick='removeLinha(this)'>Excluir</button></form></td>
				</tr>
				<?php
				}?>
			</tbody>
		</table>
	</div>
	<br><br>
	<div id="botao">
	
			<a href="criar.php"><input class="btn btn-success" type="submit" value="Criar" id="criar"></a>	
							
	</div>
	<script>
		btnAdicionar.addEventListener("click", function(){
			var selecionados = tabela.getElementsByClassName("selecionado");
			if(selecionados.length < 1){
				alert("Selecione um produto");
				return false;
			}
	
			var dados = "";
			var quantidade = document.querySelector("#form_qnt").value;
			
			
			for(var i = 0; i < selecionados.length; i++){
				var selecionado = selecionados[i];
				selecionado = selecionado.getElementsByTagName("td");
				dados += "ID: " + selecionado[0].innerHTML + " - Nome: " + selecionado[1].innerHTML + " - Categoria: " + selecionado[2].innerHTML + " - Quantidade: " + quantidade + "\n";
				var dado_id = selecionado[0].innerHTML;
				dado_nome = selecionado[1].innerHTML;
				dado_categoria = selecionado[2].innerHTML;
				dado_quantidade = quantidade;
				
			}
			
			if (quantidade <= 0){
				alert("Adicione pelo menos uma(1) quantidade do produto");
			}else{
				//alert(dados);
				var validar = percorrerCart(dado_id);
				if(validar == true){
					console.log("Entou no IF False, produto ja existente");
					alert("Esse produto ja está no carrinho");
				}else{
					console.log("Entrou no IF true, produto novo");
					adicionaLinha(dado_id, dado_nome, dado_categoria, dado_quantidade);
					document.getElementById('form_idp').value = dado_id;
					alert("Produto adicionado ao carrinho");
				}
				
				
			}
	
		});
		
		function adicionaLinha(id, nome, categoria, quantidade) {

            var tabela = document.getElementById("tabelaCart").getElementsByTagName('tbody')[0];
            var numeroLinhas = tabela.rows.length;
            var linha = tabela.insertRow(tabela);
            var celula1 = linha.insertCell(0);
            var celula2 = linha.insertCell(1);   
            var celula3 = linha.insertCell(2); 
            var celula4 = linha.insertCell(3); 
            var celula5 = linha.insertCell(4); 
            celula1.innerHTML = id; 
            celula2.innerHTML = nome; 
            celula3.innerHTML = categoria;
            celula4.innerHTML = quantidade;
            celula5.innerHTML =  "<button class='btn btn-danger' onclick='removeLinha(this)'>Excluir</button>";


            /*var tabela_per = document.getElementById("tabelaCart");
			for (var i = 1, row; row = tabela_per.rows[i]; i++){
				for (var j = 0, col; col = row.cells[j]; j++){
					console.log(row.cells[0].innerHTML);
				}
			}*/
            
        }

		function removeLinha(linha) {
            var i=linha.parentNode.parentNode.rowIndex;
            document.getElementById('tabelaCart').deleteRow(i);
          } 

		function percorrerCart(id){//vai percorrer o carrinho e excluir caso ja tenha produto

			var tabela = document.getElementById("tabelaCart");
			var z = "";
			for (var i = 1, row; row = tabela.rows[i]; i++){
				for (var j = 0, col; col = row.cells[j]; j++){
					if(id == row.cells[0].innerHTML){
						z++;
						
					}else{
				
					}
				
				}
			}
			if(z >= 1){
				return true;
			}else{
				return false;
			}
						
		}

		var btnCriar = document.getElementById("criar");
		btnCriar.addEventListener("click", function(){
		
			
			var tabela = document.getElementById("tabelaCart");
			
			for (var i = 1, row; row = tabela.rows[i]; i++){
				for (var j = 0, col; col = row.cells[j]; j++){
					if(j == 0){
						var produto_id = row.cells[j].innerHTML;
					}
					if(j == 3){
						var produto_qnt = row.cells[j].innerHTML;
					}
					
					console.log(row.cells[j].innerHTML);			
				}
				
				var produto_id_final = produto_id;
				var produto_qnt_final = produto_qnt;
				
					
				var dados = "ID do produto: " + produto_id + ", Quantidade do produto: " + produto_qnt; 
				console.log(dados);
				
			}
		});

		
		
        
	</script>
	<br><br>
	

