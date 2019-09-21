<meta charset='utf-8'>
<?php

	session_start();
	
	include("../libs/banco.php");
	
	if ((isset($_SESSION['id'])) && (isset($_SESSION['senha']))){
		$continuarVendedor = true;
	} else {
		$continuarVendedor = false;
	}
	
	if ($continuarVendedor == true){
		
	   $id = $_SESSION['id'];
	   $nome = $_SESSION['nome'];
	   $email = $_SESSION['email'];
	
	   $sql = "SELECT * FROM VENDEDOR WHERE EMAIL='$email'";
	   $result = mysqli_query($conexao, $sql) or die(mysql_error());
	   $existe = mysqli_num_rows($result);
	
	   if ($existe > 0){
		   echo "<a href='../index.php'>Nos desculpe, porém você já é um vendedor</a>";
	   } else {
	
	      $vendedor = $_SESSION['vendedor'];
	
	
	      $q="INSERT INTO VENDEDOR(ID_VENDEDOR, USUARIO, EMAIL) VALUES
	      (0,'$nome', '$email')";
	      $r = mysqli_query($conexao, $q) or die(mysql_error());
		
	      $consulta= "SELECT * FROM VENDEDOR WHERE EMAIL='$email'";
	      $resultado = mysqli_query($conexao, $consulta) or die(mysql_error()); //executa o comando sql e guarda na variavel
	      $ex = mysqli_num_rows($resultado); //conta a qtd de linhas da variavel resultado
	if ($ex > 0){ 
		while ($linha = mysqli_fetch_array($resultado)) {
			$id_vendedor=$linha["ID_VENDEDOR"];
			$nome_vendedor=$linha["NOME"];
			$email_vendedor=$linha["EMAIL"];
			
			$_SESSION['id_vendedor'] = $id_vendedor;
			$_SESSION['nome_vendedor'] = $nome_vendedor;
			$_SESSION['email_vendedor'] = $email_vendedor;
	
		}
	}
	
	header('Location:../index.php');
	
	}
	} else {
		echo "opps,parece que você não esta logado!!!";
	}
?>
