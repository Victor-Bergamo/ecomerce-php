<?php

	session_start();

	include("libs/banco.php");
	
	$nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : null ;
	
	if (!isset($nome)){
		$nome = "Usuário Anonimo";
	}
	
	$idProduto = $_POST['idProduto'];
	$comentario = $_POST['comentario'];
	
	unset($sql, $r);
	
	$sql="INSERT INTO Comentarios (id, idProduto, nomeUsr, comentario) 
			VALUES (0, '$idProduto', '$nome', '$comentario')";
	$r = mysqli_query($conexao, $sql) or die(mysql_error());
	
	header("Location:ver_produto.php?id=$idProduto");
	
?>
