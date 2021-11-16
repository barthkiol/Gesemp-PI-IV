<?php
	session_start();
	include('../verifica_login.php');
	include_once("config.php");

	$result_categoriaP = "SELECT e.id 'Id categoria' , e.nome_categoria 'Nome Categoria', m.id 'Id Categoria Pai', m.nome_categoria 'Nome Categoria Pai' FROM categoria e LEFT JOIN categoria m ON (e.categoria_id=m.id);";
	$resultado_categoriaP = mysqli_query($conexao, $result_categoriaP);
	
	
	
	$row_categoriaP = mysqli_fetch_row($resultado_categoriaP);
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="pedido.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <link rel="icon" href="../gesempLogo1offName.png">
    
    <style>
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
<title>Categoria</title>
</head>

<body>
	<div id="pagina">
	    
	    
	        <!-- Barra de atalhos lateral -->
	        <div id="sidebar-pagina">
		        <br>
		        <div id="logo-side" style="padding-right= 50px;">
		        	 <a href="../home.php"><img src="../gesempLogo1.png" alt="Image" height="130" width="200"></a>
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
							$result_ord = "SELECT COUNT(id) AS num_result from categoria";
							$resultado_ord = mysqli_query($conexao, $result_ord);
							$row_ord = mysqli_fetch_assoc($resultado_ord);
							
							

							$quantidade_order = ceil($row_ord['num_result']);
							
							$id_categoria = filter_input(INPUT_GET, 'idCategoria', FILTER_SANITIZE_NUMBER_INT);
							
							$id_cons = $id_categoria;

							$result_categoria = "SELECT * FROM categoria where id = $id_cons";
							$resultado_categoria = mysqli_query($conexao, $result_categoria);
							$row_categoria = mysqli_fetch_row($resultado_categoria);
							
							if(!empty($id_cons)){
								if($row_categoria > 0){

							
							//echo $id_categoria . "<br>";
							//echo $id_cons . "<br>";
							
							$result_categoriaPSelf = "SELECT e.id 'Id categoria' , e.nome_categoria 'Nome Categoria', m.id 'Id Categoria Pai', m.nome_categoria 'Nome Categoria Pai' FROM categoria e LEFT JOIN categoria m ON (e.categoria_id=m.id) where e.id = $id_cons;";
							$resultado_categoriaPSelf = mysqli_query($conexao, $result_categoriaPSelf);
							$row_categoriaPSelf = mysqli_fetch_row($resultado_categoriaPSelf);
							
							?>
	                        <h1>Categoria #<?php echo $row_categoria[0];?></h1>
	                        <hr class="hr3">
	                        <div id="div_categoria">
	                       
			                 <form action="" method="POST" id="formulario">
	                        	<fieldset>
		                        <div id="div_label">
			                        <h5>Nome:</h5>
			                        <input type="search" class="form-control" id="form_nome" value=" <?php echo $row_categoria[1];?>" name="nome" required="required" >
			                        
			                    </div>   
			                    <div id="div_label">
			                        <h5>Categoria Pai:</h5> 
			                        <select id="select" class="form-control" id="form_categoria" name="categoria" required="required">
											<option value="<?php echo $row_categoriaPSelf[2];?>"><?php echo $row_categoriaPSelf[3];?></option>
											<option></option>
											<?php
												
												while($row_categoriaP = mysqli_fetch_row($resultado_categoriaP)){
											?>
											<option value="<?php echo $row_categoriaP[0];?>"><?php echo $row_categoriaP[1];?></option>
											<?php 
												}
											?>
									</select>
			                    </div>
			                    
			                   <div id="div_label">
			                   		 <input type="submit"  class="btn btn-danger" formaction="excluir_categoria.php?idCategoria=<?php echo $row_categoria[0];?>" value="Excluir">
									 <input type="submit" class="btn btn-success" formaction="alterar_categoria.php?idCategoria=<?php echo $row_categoria[0];?>" value="Salvar" >
			                   </div>
			                  
			                    </fieldset>
			                </form>
			                                     
			                    
			                    
			                   
		                   		
		                    <?php 
									}else{
							?>
							<div class='alert alert-danger' role='alert'>Categoria não encontrada!</div>
							<?php
									}
								}else{
							?>
							<div class='alert alert-danger' role='alert'>Categoria não encontrada!</div>
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