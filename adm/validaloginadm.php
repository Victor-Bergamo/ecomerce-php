<meta charset="utf-8">
<?php
    session_start();
    include ("../libs/banco.php");
    $usuario=$_POST['usuario'];
    $senha=$_POST['senha'];
    $sair = isset($_GET['sair']) ? $_GET['sair'] : null ; //SÓ FUNCIONA COM O GET
    unset($sql,$result);
    $sql= "SELECT * FROM ADM WHERE USUARIO='$usuario' AND SENHA='$senha'";
    $result = mysqli_query($conexao, $sql) or die(mysql_error()); //executa o comando sql e guarda na variavel
    $existe = mysqli_num_rows($result); //conta a qtd de linhas da variavel result
    if ($existe > 0){ //se existir alguma linha ele entra
    $linha = mysqli_fetch_array($result);
    $usuario2=$linha["USUARIO"];
    $senha2=$linha["SENHA"];
    $_SESSION['usuario'] = $usuario2;
    $_SESSION['senha'] = $senha2;
    header('Location: adm.php');
?>
<?php
        $erro=false;
    }else {
        $erro=true;
    }
    if ($erro==true) {
    include ("../libs/estilos.php");
    echo "<br><br><br><br><center><font class='texto1'>Usuário ou Senha Inválida!<br> Tente Novamente!</font>";
    echo "<br><br><font class='texto1'>Clique em <a class='link2' href='javascript:history.back(-1)'>Voltar</a> para corrigir</font>";
    }
?>
