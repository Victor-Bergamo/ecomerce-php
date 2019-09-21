<?php

	$hostname = "localhost"; // Host do servidor de dados
	$usuario = "root"; // Usuário de acesso ao servidor de dados
	$senha = ""; // Senha de acesso ao servidor de dados
	$banco = "provaphpturma358victor"; // Banco de dados a utilizar
	$conexao = mysqli_connect("$hostname", "$usuario", "$senha");
	mysqli_select_db($conexao, $banco); 

?>
