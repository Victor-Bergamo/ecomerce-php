<?php
session_start();

include ("../libs/banco.php");

$nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : null ;
$senha = isset($_SESSION['senha']) ? $_SESSION['senha'] : null ;
$email = isset($_SESSION['email']) ? $_SESSION['email'] : null ;
//$vendedor = isset($_SESSION['vendedor']) ? $_SESSION['vendedor'] : null ;
$vendedor = isset($_SESSION['vendedor']);
$_SESSION['email_vendedor'] = $email;
$_SESSION['nome_vendedor'] = $nome;


   $consulta = "SELECT * FROM VENDEDOR WHERE EMAIL='$email'";
   $resultado = mysqli_query($conexao, $consulta) or die(mysql_error()); 
   $ex = mysqli_num_rows($resultado); 
      while ($linha = mysqli_fetch_array($resultado)) {
      
         $id_vendedor = $linha["ID_VENDEDOR"];
        
         $_SESSION['id_vendedor'] = $id_vendedor;

      }
      

include ("../libs/banco.php");


?>
<!DOCTYPE html>
<html>
<head>
	<title>Games Room - Sua Loja de Jogos</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Diversos -->
	<link rel="shortcut icon" href="../img/logo01.png">
	<!-- Icons -->
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	

</head>
<body topmargin="0" bottommargin="0">
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script>

function abreconta(){
	window.location.href('conta.php');
}

</script>

<!--CABECALHO-->

<?php
if ((isset($_SESSION['id'])) && (isset($_SESSION['senha']))){ //se existir a id e a senha do usuário entra
	$continuar = true;
}else{
	$continuar = false;
}
if ($continuar==true) {

$query = "SELECT * FROM VENDEDOR WHERE EMAIL='$email'";
$resultado = mysqli_query($conexao, $query) or die(mysql_error()); 
$exist = mysqli_num_rows($resultado);

if ($exist > 0){

?> 
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Você esta no modo vendedor</strong>, para sair clique no botão sair.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<nav class='navbar navbar-expand-lg navbar-light bg-light'>
  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarTogglerDemo01' aria-controls='navbarTogglerDemo01' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
  <div class='collapse navbar-collapse' id='navbarTogglerDemo01'>
 		<a class='navbar-brand' href='home.php'><img src='../img/logo02.png' width='150px'></a>
    
    <form class='form-inline my-2 my-lg-0' action='busca.php' method='post' target='pri'>

      <input class='form-control mr-sm-2' type='text' placeholder='Digite aqui o que você procura, temos de tudo :D' name='buscar' style='width: 600px;'>
      <button class='btn btn-outline-success my-2 my-sm-0' name='ok' type='submit'> <i class='fas fa-search' style='margin-top: 5px; height: 20px;'></i></button>
    </form>
				<span><img src='../img/appEscrita.png' width='330px'></span>
  </div>

</nav>

<!-- Segundo Menu -->

<nav class='navbar navbar-expand-lg navbar-light bg-light'>

	<ul class='navbar-nav mr-auto mt-2 mt-lg-0'>
           
      <li class='nav-item active'>
        	<a class='nav-link' target='pri' href='listarprodutos.php'><i class="fas fa-list">&nbsp;</i>Listar Produtos </a><span class='sr-only'>(current)</span></a>
      </li>
      
      
      <li class='nav-item active'>
        <a class='nav-link' target='pri' id="a" href="adicionarproduto.php" ><i class="fas fa-plus">&nbsp;</i>Adicionar Produto</a> <span class='sr-only'>(current)</span></a>
      </li>
      
      <li class='nav-item active'>
      	<button class='btn' data-toggle='modal' data-target='#ExemploModalCentralizado'>
			  Gerenciar Conta
			</button>
				<div class='modal fade' id='ExemploModalCentralizado' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
				  <div class='modal-dialog modal-dialog-centered' role='document'>
					 <div class='modal-content'>
						<div class='modal-header'>
						  <h5 class='modal-title' id='TituloModalCentralizado'> Informações do vendedor </h5>
						  <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
							 <span aria-hidden='true'>&times;</span>
						  </button>
						</div>
						<div class='modal-body'>
							      
								Nome: <?php echo "$nome"; ?><br>
								Email: <?php echo "$email"; ?><br>
								<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
								Você esta no modo vendedor<a href='validasair.php?sair=sim'> clique aqui </a> para sair
					
			
						</div>
						<div class='modal-footer'>
						  <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
						</div>
					 </div>
				  </div>
				</div>
      </li>
   </ul>
   <a class='nav-link disabled' href='#' tabindex='-1' aria-disabled='true'>Seja Muito Bem Vindo(a) <?php echo "$nome";?> </a>
      <form action='validasair.php?sair=sim' target='pri' method='POST'>
   <button class='btn btn-light' type='submit' name='Sair'><i class='fa fa-minus-square-o'></i> Sair</button>
</nav></form>
<?php
}else{
	
}
?>

<script>

	$('.alert').alert()

</script>    


<iframe name="pri" width="100%" height="700" id="iframe1" frameborder="0" src="listarprodutos.php" style="display:block; width:100%; border:none;"></iframe></td>

<!-- chamando os scripts do jquery e bootstrap -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
<?php

} else {
	header('Location:../index.php');
}

?>
