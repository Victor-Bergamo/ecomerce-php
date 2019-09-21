<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<style>

	body{
		font-family: Arial;
	}

	.meio {
		margin: 0 auto;
	}

	div.container-img {
		/*width: 250px;*/
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		text-align: center;
		float: left;
		margin: 10px;
		padding: 10px;
	}

	div.container-img-after {
		width: 250px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		text-align: center;
		clear: left;  
	}

	div.container {
		padding: 10px;
		
	}

	div.alinhamento-meio{
		padding: 10px;
		margin: 10px 20%;
		display: block;

	}
	div.alinhamento-meio-2{
		padding: 10px;
		margin: 10px 10%;
		display: block;   

	}

	div.promocao{
		border-left: 6px solid #34eb92;
		padding: 10px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		font-family: Arial;
		color: black;
	}
	div.promocao-link{
		border-left: 6px solid #34eb92;
		padding: 10px;
		margin: 10px 230px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		text-align: center;
	
	}

	a.promocao-link{
		text-decoration: none;
		font-family: Arial;
		color: black;
	}

	div.informacoes-gerais{
		border-left: 6px solid #03a5fc;
		padding: 10px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		font-family: Arial;
		color: black;
		margin: 10px 200px;
	}

	.responsive {
	  padding: 10 6px;
	  float: left;
	  width: 24.99999%;
	}

	@media only screen and (max-width: 700px) {
	  .responsive {
		 width: 49.99999%;
		 margin: 6px 0;
	  }
	}

	@media only screen and (max-width: 500px) {
	  .responsive {
		 width: 100%;
	  }
	}

</style>
<?php
      include("libs/banco.php");
      unset($result, $num, $n, $ids, $linha, $i, $l);
      //*********** PROMOÇÕES ***********//
      $result=mysqli_query($conexao, "SELECT id FROM Produtos WHERE promocao=1");
      $num=mysqli_num_rows($result);
      $n=$num-1;
      $ids=array();
      $x=0;
      while($linha=mysqli_fetch_array($result)){
         $ids[$x]=$linha["id"];
         $x++;
         
      }
      $produto1=$ids[rand(0,$n)];
      $produto2=$ids[rand(0,$n)];
      $produto3=$ids[rand(0,$n)];
      
      while ($produto2==$produto1){
         $produto2=$ids[rand(0,$n)];
      }
		while (($produto3==$produto1)||($produto3==$produto2)){
      	$produto3=$ids[rand(0,$n)];
		}
			
		
      unset($g, $result, $sql, $num, $n, $ids, $linha, $l);
      $sql="SELECT id, nome, marca, categoria, foto, valor FROM Produtos WHERE id='$produto1'";
      $r=mysqli_query($conexao, $sql);
      while($l=mysqli_fetch_array($r)){
         $id1=$l["id"];
         $categoria1=$l["categoria"];
         $foto1=$l["foto"];
         $nome1 = $l["nome"];
         $marca1 = $l["marca"];
         $valor1 = $l["valor"];
      }
      unset($g, $result, $sql, $num, $n, $ids, $linha, $l);
      $sql="SELECT id, nome, marca, categoria, foto, valor FROM Produtos WHERE id='$produto2'";
      $r=mysqli_query($conexao, $sql);
      while($l=mysqli_fetch_array($r)){
         $id2=$l["id"];
         $categoria2=$l["categoria"];
         $foto2=$l["foto"];
         $nome2 = $l["nome"];
         $marca2 = $l["marca"];
         $valor2 = $l["valor"];
      }
      unset($g, $result, $sql, $num, $n, $ids, $linha, $l);
      $sql="SELECT id, nome, marca, categoria, foto, valor FROM Produtos WHERE id='$produto3'";
      $r=mysqli_query($conexao, $sql);
      while($l=mysqli_fetch_array($r)){
         $id3=$l["id"];
         $categoria3=$l["categoria"];
         $foto3=$l["foto"];
         $nome3 = $l["nome"];
         $marca3 = $l["marca"];
         $valor3 = $l["valor"];
      }
     
      $mes=date("m", time());
      $meses= array("janeiro", "fevereiro", "março", "abril", "maio", "junho", "julho", "agosto", "setembro", "outubro", "novembro", "dezembro");
      $mes=$meses[($mes-1)];
?>

<div class="informacoes-gerais">

	<table>
		<tr>
			<td><img src="img/truck-icon.png" width="60px;"></td>
			<td>Entregamos para todo o brasil</td>
			<td><img src="img/card-icon.png" width="60px;"></td>
			<td>Parcelamos em até 12x no cartão</td>
		</tr>
		
	</table>
</div>

   <div class="promocao-link">Confira as promoções e lançamentos deste mês de <b><u><?php echo $mes; ?></b></u></div>

<div class="alinhamento-meio" align="center">
   
<?php

	$nomeTitulo1 = $nome1;
   	$nomeTitulo2 = $nome2;
   	$nomeTitulo3 = $nome3;

  	$ppp = "...";

	if(strlen($nome1) > 25){
		$nome1_divide=explode(" ",$nome1);
		$nome1=$nome1_divide[0].$ppp;
	}
	
	if(strlen($nome2) > 25){
		$nome2_divide=explode(" ",$nome2);
		$nome2=$nome2_divide[0].$ppp;
	}
	
	if(strlen($nome3) > 25){
		$nome3_divide=explode(" ",$nome3);
		$nome3=$nome3_divide[0].$ppp;
	}
   
   
?>
<script>

	function redimensiona() {
		document.images['img'].width = 200;
		document.images['img'].height = 200;
	}
	
	function redimensiona2() {
		document.images['img2'].width = 200;
		document.images['img2'].height = 200;
	}
	
	function redimensiona3() {
		document.images['img3'].width = 200;
		document.images['img3'].height = 200;
	}
	
	function redimensiona4() {
		document.images['img4'].width = 200;
		document.images['img4'].height = 200;
	}
	
	function redimensiona5() {
		document.images['img5'].width = 200;
		document.images['img5'].height = 200;
	}
	
	function redimensiona6() {
		document.images['img6'].width = 200;
		document.images['img6'].height = 200;
	}

	function redimensiona7() {
		document.images['img7'].width = 200;
		document.images['img7'].height = 200;
	}
</script>
		<div class="container-img" align="center">
		   <a href="ver_produto.php?id=<?php echo $id1; ?>&cat=<?php echo $categoria1; ?>">
		   <img class="container-img" onload="redimensiona()" id="img" src="produtos/<?php echo $foto1; ?>" width=250px height="200px" border=0 /></a>
		   <div class="container">
		      <p title="<?php echo $nomeTitulo1; ?>"><?php echo "$nome1";?></p>
		   </div>
		</div>

		<div class="container-img" align="center">
		   <a href="ver_produto.php?id=<?php echo $id2; ?>&cat=<?php echo $categoria2; ?>">
		   <img class="container-img" onload="redimensiona2()" id="img2" src="produtos/<?php echo $foto2; ?>" width=250px height="200px" border=0 /></a>
		   <div class="container">
		      <p title="<?php echo $nomeTitulo2; ?>"><?php echo "$nome2";?></p>
		   </div>
		</div>
		<div class="container-img" align="center">
		   <a href="ver_produto.php?id=<?php echo $id3; ?>&cat=<?php echo $categoria3; ?>">
		   <img class="container-img" onload="redimensiona3()" id="img3" src="produtos/<?php echo $foto3; ?>" border=0 width=250px height="200px" /></a>
		   <div class="container">
		      <p title="<?php echo $nomeTitulo3; ?>"><?php echo "$nome3";?></p>
		   </div>
		</div>
</div>
</div>

<div class="container-img-after"></div>
<!-- *********** PROMOÇÕES ************ -->

<!-- *********** LANÇAMENTOS ********* -->
<?php
unset ($result, $num, $n, $ids, $linha, $l);
$result=mysqli_query($conexao, "SELECT id FROM Produtos WHERE lancamento=1");
$num=mysqli_num_rows($result);
$n=$num-1;
$ids=array();
$x=0;
while($linha=mysqli_fetch_array($result)){
   $ids[$x]=$linha["id"];
   $x++;
}
$produto1=$ids[rand(0, $n)];
$produto2=$ids[rand(0, $n)];
$produto3=$ids[rand(0, $n)];
$produto4=$ids[rand(0, $n)];
while ($produto2==$produto1){
  $produto2=$ids[rand(0,$n)];
}
while (($produto3==$produto1)||($produto3==$produto2)){
   $produto3=$ids[rand(0,$n)];
}
while (($produto4==$produto1)||($produto4==$produto2)||($produto4==$produto3)){
$produto4=$ids[rand(0, $n)];
}


unset($g, $result, $sql, $num, $n, $ids, $linha, $l);
$sql="SELECT id, nome, marca, categoria, foto, valor FROM Produtos WHERE id='$produto1'";
$r=mysqli_query($conexao, $sql);
while ($l=mysqli_fetch_array($r)){
   $id1=$l["id"];
   $categoria1=$l["categoria"];
   $foto1=$l["foto"];
	$nome1 = $l["nome"];
	$marca1 = $l["marca"];
	$valor1 = $l["valor"];
}


unset($g, $result, $sql, $num, $n, $ids, $linha, $l);
$sql="SELECT id, nome, marca, categoria, foto, valor FROM Produtos WHERE id='$produto2'";
$r=mysqli_query($conexao, $sql);
while ($l=mysqli_fetch_array($r)){
   $id2=$l["id"];
   $categoria2=$l["categoria"];
   $foto2=$l["foto"];
   $nome2 = $l["nome"];
	$marca2 = $l["marca"];
	$valor2 = $l["valor"];
}


unset($g, $result, $sql, $num, $n, $ids, $linha, $l);
$sql="SELECT id, nome, marca, categoria, foto, valor FROM Produtos WHERE id='$produto3'";
$r=mysqli_query($conexao, $sql);
while ($l=mysqli_fetch_array($r)){
   $id3=$l["id"];
   $categoria3=$l["categoria"];
   $foto3=$l["foto"];
   $nome3 = $l["nome"];
	$marca3 = $l["marca"];
	$valor3 = $l["valor"];
}

unset($g, $result, $sql, $num, $n, $ids, $linha, $l);
$sql="SELECT id, nome, marca, categoria, foto, valor FROM Produtos WHERE id='$produto4'";
$r=mysqli_query($conexao, $sql);
while ($l=mysqli_fetch_array($r)){
   $id4=$l["id"];
   $categoria4=$l["categoria"];
   $foto4=$l["foto"];
   $nome4 = $l["nome"];
	$marca4 = $l["marca"];
	$valor4 = $l["valor"];
}
?>

<div class="promocao-link">Lançamentos</div>

<?php

   $nomeTitulo1 = $nome1;
   $nomeTitulo2 = $nome2;
   $nomeTitulo3 = $nome3;
   $nomeTitulo4 = $nome4;

   $ppp = "...";

   if(strlen($nome1) > 25){
      $nome1_divide=explode(" ",$nome1);
	   $nome1=$nome1_divide[0].$ppp;
   }
   
   if(strlen($nome2) > 25){
      $nome2_divide=explode(" ",$nome2);
	   $nome2=$nome2_divide[0].$ppp;
   }
   
   if(strlen($nome3) > 25){
      $nome3_divide=explode(" ",$nome3);
	   $nome3=$nome3_divide[0].$ppp;
   }
   
   if(strlen($nome4) > 25){
      $nome4_divide=explode(" ",$nome4);
	   $nome4=$nome4_divide[0].$ppp;
   }

?>

<div class="alinhamento-meio-2" align="center">

		<div class="container-img" align="center">
		   <a href="ver_produto.php?id=<?php echo $id1; ?>&cat=<?php echo $categoria1; ?>">
   		<img src="produtos/<?php echo $foto1; ?>" onload="redimensiona4()" id="img4" border=0 width=250px height="200px"/></a>
		   <div class="container">
		      <p title="<?php echo $nomeTitulo1; ?>"><?php echo "$nome1";?></p>
		   </div>
		</div>
   
   	<div class="container-img" align="center">
   		<a href="ver_produto.php?id=<?php echo $id2; ?>&cat=<?php echo $categoria3; ?>">
   		<img src="produtos/<?php echo $foto2; ?>" onload="redimensiona5()" id="img5" border=0 width=250px height="200px"/></a>
   		<div class="container">
		      <p title="<?php echo $nomeTitulo2; ?>"><?php echo "$nome2";?></p>
		   </div>
		</div>
		
		<div class="container-img" align="center">
		   <a href="ver_produto.php?id=<?php echo $id3; ?>&cat=<?php echo $categoria3; ?>">
   		<img src="produtos/<?php echo $foto3; ?>" onload="redimensiona6()" id="img6" border=0 width=250px height="200px"/></a>
		   <div class="container">
		      <p title="<?php echo $nomeTitulo3; ?>"><?php echo "$nome3";?></p>
		   </div>
		</div>
		
		<div class="container-img" align="center">
		   <a href="ver_produto.php?id=<?php echo $id4; ?>&cat=<?php echo $categoria4; ?>">
   		<img src="produtos/<?php echo $foto4; ?>" onload="redimensiona7()" id="img7" border=0 width=250px height="200px"/></a>
		   <div class="container">
		      <p title="<?php echo $nomeTitulo4; ?>"><?php echo "$nome4";?></p>
		   </div>
		</div>
   </div>
</div>

<div class="container-img-after"></div> <br>

