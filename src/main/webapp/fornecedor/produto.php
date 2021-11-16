<?php
	session_start();
	include('../verifica_login.php');
	include_once("config.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="pedido.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <link rel="icon" href="gesempLogo1offName.png">
    
    <style>
    	#botoes{
    		width: 200px;
    		height: 200px;
			position: absolute;
			left: 42%;
			top: 115%;
			transform: translate(-50%, -50%);
		}
		
		form input[type=search]{
			width: 70%;
			height: 45px;
			border: 1px solid #ccc;
			padding-left: 10px;
			margin: 10px 10px;
			border-radius: 20px;
		}
		form #select{
			width: 70%;
			height: 45px;
			border: 1px solid #ccc;
			padding-left: 10px;
			margin: 10px 10px;
			border-radius: 20px;
			
		}
		form input[type=submit]{
			border: 1px solid #ccc;
			padding-left: 10px;
			margin: 60px 30px;
			
			
		}
    </style>
<meta charset="utf-8">
<title>Produto</title>
</head>

<body>
	<div id="pagina">
	    
	    
	        <!-- Barra de atalhos lateral -->
	        <div id="sidebar-pagina">
		        <br>
		        <div id="logo-side" style="padding-right= 50px;">
		        	 <a href="../home.php"><img src="gesempLogo1.png" alt="Image" height="130" width="200"></a>
		        </div>
		       <h6 style="color: white; padding-left: 15px;">Olá, <?php echo $_SESSION['nomeuser'];?></h6>
		        <br>
		            <ul class="sidebar-nav">
		                 <li><a href="produtos.php">PRODUTOS</a></li>
	              	  	<li><a href="orders.php">PEDIDOS</a></li>
	                	<li><a href="categorias.php">CATEGORIAS</a></li>
	                	<li><a href="#">PERFIL</a></li>
	                	<li><a href="../logout.php">SAIR</a></li>
		            </ul>
	        
	        </div>
	    
	        <!-- conteudo da pagina -->
	        <div id="content-pagina">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-lg-12">
	                        <a href="#" class="btn btn-primary btn-sm" id="sidebar-toggle">Menu</a>
	                        <div class="alert" id="alert" role="alert"></div>
	                        <?php
							if(isset($_SESSION['msg'])){
								echo $_SESSION['msg'];
								unset ($_SESSION['msg']);
							}	
							$result_ord = "SELECT COUNT(id) AS num_result from produto";
							$resultado_ord = mysqli_query($conexao, $result_ord);
							$row_ord = mysqli_fetch_assoc($resultado_ord);
							
							$quantidade_order = ceil($row_ord['num_result']);
							
							$id_produto = filter_input(INPUT_GET, 'idProduto', FILTER_SANITIZE_NUMBER_INT);
							
							$id_cons = $id_produto;
							

							$result_produto = "SELECT * FROM produto INNER JOIN categoria on produto.categoria_id = categoria.id where produto.id = $id_cons";
							$resultado_produto = mysqli_query($conexao, $result_produto);
							$row_produto = mysqli_fetch_row($resultado_produto);


							if(!empty($id_cons)){
								if($row_produto > 0){

							
							//echo $id_produto . "<br>";
							//echo $id_cons . "<br>";
							
						
							
							?>
	                        <h1>Produto #<?php echo $row_produto[0];?></h1>
	                        <hr class="hr3">
	                       
	                        <div id="div_produto">
	                        <form action="" method="POST" id="formulario">
	                        	<fieldset>
		                        <div id="div_label">
			                        <h5>Nome:</h5>
			                        <input type="search" class="form-control" id="form_nome" value=" <?php echo $row_produto[3];?>" name="nome" required="required" >
			                        
			                    </div>   
			                    <div id="div_label">
			                        <h5>Categoria:</h5> 
			                        <select id="select" class="form-control" id="form_categoria" name="categoria" required="required">
											<option value="<?php echo $row_produto[7];?>"><?php echo $row_produto[8];?></option>
											<option></option>
											<?php
												$result_categoria = "SELECT * FROM categoria";
												$resultado_categoria = mysqli_query($conexao, $result_categoria);
												while($row_categoria = mysqli_fetch_row($resultado_categoria)){
											?>
											<option value="<?php echo $row_categoria[0];?>"><?php echo $row_categoria[1];?></option>
											<?php 
												}
											?>
									</select>
			                    </div>
			                    <div id="div_label">
			                        <h5>EAN:</h5> 
			                        <input type="search" class="form-control" id="form_nome" value=" <?php echo $row_produto[2];?>" name="ean" required="required">
			                    </div>
			                    <div id="div_label">
			                        <h5>SKU:</h5>
			                        <input type="search" class="form-control" id="form_nome" value=" <?php echo $row_produto[4];?>" name="sku" required="required">
			                    </div>
			                    <br>
			                    <div id="div_label">
			                        <h5>Descrição:</h5> 
			                        <textarea class="form-control" id="descricao" rows="3" name="descricao" required="required"><?php echo $row_produto[1];?></textarea>
			                    </div>
			                    <?php if($_SESSION['userLog'] == "Gerente"):?>
			                    <div id="div_label">
			                   		 <input type="submit"  class="btn btn-danger" formaction="excluir_produto.php?idProduto=<?php echo $row_produto[0];?>" value="Excluir">
									 <input type="submit" class="btn btn-success" formaction="alterar_produto.php?idProduto=<?php echo $row_produto[0];?>" value="Salvar" >
			                    </div>
			                  	<?php endif;?>
			                    </fieldset>
			                </form>    
			                    
			                   
		                   		
		                    <?php 
									}else{
							?>
							<div class='alert alert-danger' role='alert'>Produto não encontrado!</div>
							<?php
									}
								}else{
							?>
							<div class='alert alert-danger' role='alert'>Produto não encontrado!</div>
		                    <?php
							}
							?>
		                     
		                   		
	                    </div>
	                </div>
	            </div>
	        </div>
	    
		</div>
	</div>
	
    <script>
        $("#sidebar-toggle").click( function (e){ //display do menu
            e.preventDefault();
            $("#pagina").toggleClass("menuDisplayed");
        });



        

    </script>


</body>

</html>