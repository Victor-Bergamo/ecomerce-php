<?php

session_start();

$nomeProduto=$_POST["nome"];
$descricao=$_POST["descricao"];
$marca=$_POST["marca"];
$valor=$_POST["valor"];
$categoria=$_POST["categoria"];
$qtdestoque=$_POST["qtdestoque"];
@$promocao=$_POST["promocao"];
@$lancamento=$_POST["lancamento"];
$foto=$_POST["foto"];
$idp=$_POST["alterar"];


if(!$promocao){
$promocao=0;
}
if(!$lancamento){
$lancamento=0;
}
include("../libs/banco.php");
unset($sql);
$sql = "UPDATE Produtos SET nome = '$nomeProduto', descricao = '$descricao', marca = '$marca', valor = '$valor', categoria = '$categoria', qtd_estoque = '$qtdestoque', promocao = '$promocao', lancamento = '$lancamento', foto = '$foto' WHERE id = '$idp'";
mysqli_query($conexao, $sql) or die(mysql_error());


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
	
		<div align="center"><h1>Você conseguiu alterar com sucesso</h1></div>
	
	</div>

</body>
</html>
