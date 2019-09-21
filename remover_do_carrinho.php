<?php

    include("libs/banco.php");
    $idRemover = $_GET["idpro"];
    $id_usuario = $_GET["idusu"];
    unset($sql);
    $sql = "DELETE FROM carrinho WHERE id_usuario = '$id_usuario' AND id_produto = '$idRemover'";
    mysqli_query($conexao, $sql);
    header('Location:carrinho.php');

?>
