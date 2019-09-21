<?php

	include('../libs/estilos.php');

?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Games Room - Administração</title>
</head>
<body onLoad="sf()">
<style>

body{
   text-align: center;
}

input[type=text], [type=password] {
	border-radius: 20px;
	width: 280px;
	height: 40px;
	text-align: center;
	border-color: grey;
	border-style: solid;
 	transition: width 0.8s
 	
}

input[type=text]:focus{
	width: 340px;
	border-color: #23b24e;
}

[type=password]:focus{
	width: 340px;
	border-color: #23b24e;
}


input[type=submit]{
	border-radius: 20px;
	width: 280px;
	height: 40px;
	text-align: center;
	border-color: none;
	background-color:#3050f0;
	color: white;
	border-style: solid;
 	transition: width 0.8s
}

.container{
   width: 500px;
   height: 300px;
   position: relative;
   left: 50%;
   margin-left: -250px;
}
.box{
   padding: 10px;
}

.textou{
	max-width: 480px;
	text-align: center;
	margin: 60px auto;
	font-family: 'Courier New', Courier, monospace;
	color: rgb(5, 1, 1);
}
.textou::after{
	content: '|';
	margin-left: 5px;
	opacity: 1;
	animation: pisca .7s infinite;
}
@keyframes pisca{
	0%, 100%{
		opacity: 1;
	}
	50%{
		opacity: 0;
	}
} 

</style>
<script>
function sf(){
	document.adm.usuario.value="";
	document.adm.senha.value="";
}
</script>
<div class="container">
<div>

	<h1 class="textou">Administração</h1>

</div>
<script>

function typeWriter(elemento){
	const textoArray = elemento.innerHTML.split('');
		elemento.innerHTML = '';
		textoArray.forEach((letra, i) => {
			setTimeout(() => elemento.innerHTML += letra, 75 * i)
	});
}

const titulo = document.querySelector('.textou');
console.log(titulo);

typeWriter(titulo);

</script>

<form name="adm" action="validaloginadm.php" method="post">

<div class="container" align="center">

   <div class="box">
	
	   <input name="usuario" placeholder="user" type="text" size="15" maxlength="15" />

   </div>
   <div class="box">

	   <input name="senha" type="password" placeholder="password" size="15" maxlength="15" />
	
   </div>
   <div class="box">
      <input type="submit" value="Entrar" />
   </div>
   
</div>

</body>
</html>
