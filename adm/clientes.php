<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
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
<div class="jumbotron">

<h1>Clientes</h1>



<?php
   include("../libs/banco.php");
   unset($sql,$r,$n,$l);
   $sql="SELECT ID_CLIENTE,NOME,CIDADE,ESTADO,EMAIL FROM CLIENTES";
   $r=mysqli_query($conexao, $sql);
?>
<table id="customers" border="1" width=40% align="center">

<tr bgcolor="#CCCCCC">

   <th align="center"> ID  </th>
   <th align="center"> Nome  </th>
   <th align="center"> Cidade  </th>
   <th align="center"> Estado  </th>
   <th align="center"> E-mail  </th>

</tr>
<?php

   while($l=mysqli_fetch_array($r)){

?>
<tr>
<td align="left">
<?php 

	echo $l["ID_CLIENTE"]; 

?>  </td>
<td align="center">  
<?php 

	echo $l["NOME"]; 

?>  </td>
<td align="center">  
<?php 

	echo $l["CIDADE"]; 

?>
  </td>
<td align="center">  
<?php 
	
	echo $l["ESTADO"]; 
	
?>  </td>
<td align="center">  
<?php 
	
	echo $l["EMAIL"]; 
	
?>  
</td>
</tr>
<?php

   }

?>
</table>
