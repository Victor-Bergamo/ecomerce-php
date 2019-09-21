<?php

	include("../libs/banco.php");

	$idp = isset($_GET['idp']) ? $_GET['idp'] : null ;
	$apagar = $idp;

	mysqli_query($conexao, "DELETE FROM Produtos WHERE id='$apagar'");

   	header("Location:adm.php");

?>
