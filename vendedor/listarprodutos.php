<html>
<body>
<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Diversos -->
	<link rel="shortcut icon" href="../img/logo01.png">
	<!-- Icons -->
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

</style>

<?php

	session_start();

	include ("../libs/banco.php");
	include("../libs/valor_formata.php"); 

	$email = isset($_SESSION['email']) ? $_SESSION['email'] : null ;

	$sql = "SELECT * FROM Produtos WHERE email='$email'";
	$result = mysqli_query($conexao, $sql) or die (mysql_error);
		$i = mysqli_num_rows($result);

?>

<table id="customers" border="1" width=40% align="center">
	<tr>
		<th align="center" width=15%>Nome</th>
		<th align="center" width=50%>Marca</th>
		<th align="center" width=50%>Valor</th>
		<th align="center" width=50%> Quantidade</th>
		<th align="center">Seu e-mail</th>
		<th align="cender"> Apagar</th>
		<th align="cender"> Editar</th>
	</tr>
	<?php
	
		if ($i > 0){
			while ($linha = mysqli_fetch_array($result)){
				$id = $linha["id"];
				$nomeProduto = $linha["nome"];
				$marca = $linha["marca"];
				$valor = $linha["valor"];
				$qtdestoque = $linha["qtd_estoque"];
				$emailVendedor = $linha["email"];
				$foto = $linha["foto"];
				
	?>
								
<tr>
	<td align=right><?php echo "$nomeProduto"; ?></td>
	<td><?php echo "$marca"; ?></td>
	<td><?php echo FormatarValor($valor); ?></td>
	<td><?php echo "$qtdestoque"; ?></td>
	<td><?php echo "$emailVendedor"; ?></td>
	<td> <a href="apagarproduto.php?idp=<?php echo $id ?>" title='Apagar'> <i class='fas fa-trash-alt'></i> </a></td>
	<td> <a href="alterarproduto.php?idp=<?php echo $id ?>" title='Editar'> <i class='fas fa-edit'></i> </a></td>
</tr>
	<?php
			}
		} else {
   ?>
Você não possui nenhum produto sendo vendido,  <a href='adicionarproduto.php' target='pri'> clique aqui</a> para poder adicionar um produto
   <?php
		}
	?>
</table>
</body>
</html>
