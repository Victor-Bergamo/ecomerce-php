<?php

	session_start();
	if ((!isset($_SESSION['usuario'])) || (!isset($_SESSION['senha']))) { 
		
		header('Location: index.php');

	}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Concórdia Online - Administração</title>
</head>
<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Diversos -->
	<link rel="shortcut icon" href="img/logo01.png">
   <link rel="stylesheet" href="css/banner.css" type="text/css" />
	<!-- Icons -->
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
<style>
body{
	margin:0; 
	background:#CCCCCC;
}

</style>
<?php

   include("../libs/banco.php");
   include("../libs/estilos.php");
   $sql="SELECT ID_CLIENTE FROM CLIENTES";
   $result=mysqli_query($conexao, $sql);
   $qtd_usuarios=mysqli_num_rows($result); //conta a qtd de usuarios

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarTogglerDemo01' aria-controls='navbarTogglerDemo01' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
  <div class='collapse navbar-collapse' id='navbarTogglerDemo01'>
 		<a class='navbar-brand' href='home.php'><img src='../img/logo02.png' width='150px'></a>
  </div>
  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
  <li class="nav-item active">
        <a class="btn btn-light" href='adm.php?id=produtos'><i class="fas fa-box">&nbsp;</i>Produtos</a>
  </li>
  <li class="nav-item active">
  
      <a class="btn btn-light" href="adm.php?id=clientes"><i class="fas fa-user-alt">&nbsp;</i>Clientes</a>
  
  </li>    
   </ul>
   
<a class='nav-link disabled' style="font-size: 16px;" tabindex='-1' aria-disabled='true'> <?php echo $qtd_usuarios; ?> cliente(s) cadastrado(s) no banco de dados </a>

<a class='btn btn-light' href="logout.php"><i class='fa fa-minus-square-o'></i> Sair</a>

</nav>

<?php

	$id = isset($_GET['id']) ? $_GET['id'] : null ;

	if(!$id){

		$id = "produtos.php";
		include("$id");
	
	} else {

		$pagina=$id.".php";
		include("$pagina");

	}

?>

</body>
</html>
