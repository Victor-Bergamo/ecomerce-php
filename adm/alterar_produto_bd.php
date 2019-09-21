<?php
$nome=$_POST["nome"];
$descricao=$_POST["descricao"];
$marca=$_POST["marca"];
$valor=$_POST["valor"];
$categoria=$_POST["categoria"];
$qtdestoque=$_POST["qtdestoque"];
$promocao=$_POST["promocao"];
$lancamento=$_POST["lancamento"];
$foto=$_POST["foto"];
$idp=$_POST["alterar"];
$alterar = $idp;


if(!$promocao){
$promocao=0;
}
if(!$lancamento){
$lancamento=0;
}
include("../libs/banco.php");
unset($sql);
$sql = "UPDATE Produtos SET nome = '$nome', descricao = '$descricao', marca = '$marca', valor = '$valor', categoria = '$categoria', qtd_estoque = '$qtdestoque', promocao = '$promocao', lancamento = '$lancamento', foto = '$foto' WHERE id = '$idp'";
mysqli_query($conexao, $sql) or die(mysql_error());
header('Location:adm.php?id=produtos');

?>
