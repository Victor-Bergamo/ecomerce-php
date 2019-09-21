<?php

	session_start();
	include ("../libs/banco.php");
	
	$nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : null ;
   $senha = isset($_SESSION['senha']) ? $_SESSION['senha'] : null ;
   $email = isset($_SESSION['email']) ? $_SESSION['email'] : null ;
	
	unset($sql);
	$sair = isset($_GET['sair']) ? $_GET['sair'] : null ; //SÓ FUNCIONA COM O GET
	if ($sair=="sim") {
		$_SESSION['id_vendedor'] = null;
		$_SESSION['nome_vendedor'] = null;
		$_SESSION['email_vendedor'] = null;
?>

<script>
	open('../index.php', target='_parent');
</script> 

<?php

	} else {
		$sql= "SELECT * FROM VENDEDOR WHERE EMAIL='$email'";
      $result = mysqli_query($conexao, $sql) or die(mysql_error()); 
      $existe = mysqli_num_rows($result); 
         if ($existe > 0){
            
            while ($linha = mysqli_fetch_array($result)) {
            
               $id_vendedor = $linha["ID_VENDEDOR"];
               $nome_vendedor = $linha["NOME"];
               $email_vendedor = $linha["EMAIL"];
                              
               $_SESSION['id_vendedor'] = $id_vendedor;
               $_SESSION['nome_vendedor'] = $nome_vendedor;
               $_SESSION['email_vendedor'] = $email_vendedor;
               
?>
               <script>
                  open('index.php', target='_parent');
               </script>
<?php
         
            }
         }
   }
?>

