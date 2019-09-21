<html>
<body>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<?php

	include("../libs/banco.php");

	$idp = isset($_GET['idp']) ? $_GET['idp'] : null ;

	$alterar = $idp;
	$query = mysqli_query($conexao, "SELECT * FROM Produtos WHERE id = '$alterar'");
	while($lp = mysqli_fetch_array($query)){
		$id = $lp["id"];
		$nomeProduto = $lp["nome"];
		$descricao = $lp["descricao"];
		$marca = $lp["marca"];
		$valor = $lp["valor"];
		$categoria = $lp["categoria"];
		$lancamento = $lp["lancamento"];
		$promocao = $lp["promocao"];
		$foto = $lp["foto"];
		$qtdestoque = $lp["qtd_estoque"];
	}
?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
<form name="adicionarprodutos" action="alterarprodutobd.php" method="post">
	<div class="form-group">
	<td><input type="hidden" value="<?php echo $alterar; ?>" name="alterar" /></td>
			Nome:
			<input name="nome" type="text" class="form-control" value="<?php echo $nomeProduto; ?>" size="50" maxlength="50"/>
	</div>
	<div class="form-group">
			 Descrição:
			 <textarea name="descricao" class="form-control" cols="100" rows="17"> <?php echo $descricao; ?></textarea>
	</div>
	<div class="form-group">
		Marca:
		<input type="text" class="form-control" value="<?php echo $marca; ?>" name="marca" value="<?php echo $marca; ?>">
	</div>
	<div class="form-group">
		Categoria:
		<select name="categoria" class="form-control">
		  <option value="1" selected>Mouses</option> 
		  <option value="2">Monitores</option>
		  <option value="3">Memória Ram</option>
		  <option value="4">Gabinete</option>
		  <option value="5">Placas de Som</option>
		  <option value="6">Placas de Vídeo</option>
		  <option value="7">Placas Mãe</option>
		  <option value="8">Teclados</option>
		  <option value="9">Hd's</option>
		</select>
	</div>
	<div class="form-group">
		Valor:
		<input name="valor" class="form-control" type="text" size="10" value="<?php echo $valor; ?>" maxlength="15" onFocus="this.style.background='#FFFFCC'" />
	</div>
	<div class="form-group">
		Qtd estoque:
		<input name="qtdestoque" class="form-control" value="<?php echo $qtdestoque; ?>" type="text" size="8" maxlength="15" onFocus="this.style.background='#FFFFCC'" />
	</div>
	<div class="form-group">
		Foto:
		<input name="foto" class="form-control" type="text" size="40" value="<?php echo $foto; ?>" maxlength="50" onFocus="this.style.background='#FFFFCC'"/>
	</div>
	<div class="form-check">
		
		<input name="lancamento" class="form-check-input" type="checkbox" <?php echo $lancamento; ?> value="1"/>
		<label class="form-check-label" for="defaultCheck2">
		 	Em lançamento
	  </label>
		
		</div>
	<div class="form-check">
		
		<input name="promocao" class="form-check-input" type="checkbox" <?php echo $promocao; ?> value="1" />
		<label class="form-check-label" for="defaultCheck2">
		 	Em promoção
	  </label>
		
	</div>
	<br>
	<div class="form-group">
		
		<input type="submit" class="btn btn-primary text-center" value="Alterar" />
		<input type="reset" class="btn btn-danger text-center" value="Limpar"/></form>
	
	</div>
	</div>
	</div>
</body>
</html>
