<?php

if(!$_SESSION['nomeuser']){
	header('Location: ../index.php');
	exit();
}