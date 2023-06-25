<?php
session_start();
include "../conexao.php";
if(isset($_SESSION["cpf"])) { header('Location:encomenda.php'); die(); }

if(isset($_POST["enviar"])) {

    $cpf = $_POST["cpf"];

    $sql = "SELECT codigocliente, nome, cpf FROM tbcliente WHERE cpf = '$cpf'";
    $select = $con->query($sql);
    if ($select) {
        if($linha = mysqli_fetch_array($select)) {
            $user_id     = $linha['codigocliente'];
            $user_nome  = $linha['nome'];
            $user_cpf  = $linha['cpf'];
        }
        } else { echo "Erro: " . $sql . "<br>" . $con->error; }
      if(isset($user_cpf) && $cpf == $user_cpf) {
        $_SESSION['cpf'] = $user_cpf;
        $_SESSION['nome'] = $user_nome;
              $_SESSION['codigo'] = $user_id;
        header('Location:login.php');
        die();
    }
    else { echo "Erro: Usuário inválido."; }
}

?>

<html>
    <head>
        <title>Painel de Login</title>
        <link rel="stylesheet" href="style.css">
        <meta charset="UTF-8">
    </head>
    <body style="text-align="center">
        <form action="login.php" method="POST">
            Olá, Usuário. Por favor, entre com sua conta.
            <br>
            <br>CPF: <input type="text" name="cpf" placeholder="Insira seu CPF aqui">
            <br><input type="submit" name="enviar" value="Entrar"><br>
        </form>
        <br><br>
        <a  href="cadastrar.php">Cadastrar</a>
    </body>
</html>
