<?php

   	$nomeProduto = $_POST["nome"];
	$descricao = $_POST["descricao"];
	$marca = $_POST["marca"];
	$categoria = $_POST["categoria"];
	$valor = $_POST["valor"];
	$qtdestoque = $_POST["qtdestoque"];
	$foto = $_POST["foto"];
	@$lancamento = $_POST["lancamento"];
	@$promocao = $_POST["promocao"];


	if(!$promocao){
		$promocao=0;
	}
	if(!$lancamento){
		$lancamento=0;
	}
	include ("../libs/banco.php");
	unset($sql,$r,$n,$l);
	$sql="INSERT INTO produtos (id, nome, descricao, marca, valor, categoria, qtd_estoque,	promocao, lancamento, email, foto) 
	VALUES (0,'$nomeProduto','$descricao','$marca', '$valor', '$categoria','$qtdestoque','$promocao','$lancamento', '', '$foto')";
	$r = mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
	header("Location:adm.php?id=produtos");
	
?>
<html>
<head>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Diversos -->
	<link rel="shortcut icon" href="img/logo01.png">
   	<link rel="stylesheet" href="css/banner.css" type="text/css" />
	<!-- Icons -->
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<div class="jumbotron">
	
		<div align="center"><h1>Adicionado Com Sucesso!</h1></div>
	
	</div>

</body>
</html>
