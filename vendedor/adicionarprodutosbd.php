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
<?php

	session_start();
	
	include("../libs/banco.php");

	$email = isset($_SESSION['email']) ? $_SESSION['email'] : null ;

	$nomeProduto = $_POST["nome"];
	$descricao = $_POST["descricao"];
	$marca = $_POST["marca"];
	$foto = $_POST['foto'];
	$categoria = $_POST["categoria"];
	$valor = $_POST["valor"];
	$qtdestoque = $_POST["qtdestoque"];
	@$lancamento = $_POST["lancamento"];
	@$promocao = $_POST["promocao"];


	if(!$promocao){
		$promocao=0;
	}
	if(!$lancamento){
		$lancamento=0;
	}
	
	$mensagemDeErro = "<p style='color:black; size: 30px;'> Lamentamos porém você precisa arrumar:</p>";
	$erro = 0;
	
	if ($nomeProduto == null || strlen($nomeProduto) < 9){
		$mensagemDeErro .= "<p>O nome do Produto, muito curto</p>";
		$erro=1;
	}
	
	if ($descricao == null || strlen($descricao) < 50){
		$mensagemDeErro .= "<p>A descrição do Produto, muito curta </p>";
		$erro=1;
	}
	
	if ($marca == null || strlen($marca) <= 1){
		$mensagemDeErro .= "<p>A marca pois o esta muito curto</p>";
		$erro=1;
	}
	
	if ($foto == null){
		$mensagemDeErro .= "<p>Você precisa colocar o nome da foto do Produto</p>";
		$erro=1;
	}
	
	if ($categoria == null){
		$mensagemDeErro .= "<p>Você precisa colocar a categoria</p>";
		$erro=1;
	}
	
	if ($valor == null || strlen($valor) < 1){
		$mensagemDeErro .= "<p>O produto precisa receber um valor</p>";	
		$erro=1;
	}	
	
	if ($qtdestoque == null || strlen($qtdestoque) < 1){
		$mensagemDeErro .= "<p>Você precisa colocar uma quantidade de estoque maior que 0</p>";
		$erro=1;
	}
	
	if ($erro == 0){

		unset($sql,$r,$n,$l);
		
		$sql="INSERT INTO Produtos(id, nome, descricao, marca, valor, categoria, qtd_estoque,	promocao,lancamento, email, foto) VALUES
		(0,'$nomeProduto','$descricao','$marca','$valor','$categoria','$qtdestoque','$promocao','$lancamento', '$email', '$foto')";
		$r = mysqli_query($conexao, $sql) or die(mysql_error());
?>


	<div class="jumbotron">
	
		<div align="center"><h1>Você conseguiu Adicionar o seu Produto com sucesso, agradeçemos</h1></div>
	
	</div>
	
<?php

	} else {
	
?>

<div class="jumbotron">
	
	<div align="center"><?php echo "$mensagemDeErro"; ?></div>
	
	<font color=black><br>Clique em <a href='javascript:history.back(-1);'> Voltar</a> para corrigir.

</div>
<?php
	
	}

?>
</body>
</html>
