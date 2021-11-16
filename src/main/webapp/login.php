<?php
session_start();
include('config.php');
if(empty($_POST['email']) || empty($_POST['senha'])){
	header('Location: index.php');
	exit();
}

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "SELECT * FROM gerente where email = '{$email}' and senha = '{$senha}'";

$result = mysqli_query($conexao, $query);

$row_user = mysqli_fetch_row($result);
$row = mysqli_num_rows($result);

if($row == 1){
	$_SESSION['nomeuser'] = $row_user[2];
	$_SESSION['iduser'] = $row_user[0];
	$_SESSION['userLog'] = "Gerente";
	header('Location: home.php');
	exit();
} else {
	$query = "SELECT * FROM comprador where email = '{$email}' and senha = '{$senha}'";
	$result = mysqli_query($conexao, $query);
	$row_user = mysqli_fetch_row($result);
	$row = mysqli_num_rows($result);
	if($row == 1){
		$_SESSION['nomeuser'] = $row_user[2];
		$_SESSION['iduser'] = $row_user[0];
		$_SESSION['userLog'] = "Comprador";
		header('Location: home.php');
	} else{
		$query = "SELECT * FROM aprovador where email = '{$email}' and senha = '{$senha}'";
		$result = mysqli_query($conexao, $query);
		$row_user = mysqli_fetch_row($result);
		$row = mysqli_num_rows($result);
		if($row == 1){
			$_SESSION['nomeuser'] = $row_user[2];
			$_SESSION['iduser'] = $row_user[0];
			$_SESSION['userLog'] = "Aprovador";
			header('Location: home.php');
		
		}else {
			$query = "SELECT * FROM fornecedor where email = '{$email}' and senha = '{$senha}'";
			$result = mysqli_query($conexao, $query);
			$row_user = mysqli_fetch_row($result);
			$row = mysqli_num_rows($result);
				if($row == 1){
					$_SESSION['nomeuser'] = $row_user[3];
					$_SESSION['iduser'] = $row_user[0];
					$_SESSION['userLog'] = "Fornecedor";
					header('Location: fornecedor/home.php');
			}else{
				$_SESSION['nao_autenticado'] = true;
				header('Location: index.php');
				exit();
			}
		
		}
	}
}




	
	
