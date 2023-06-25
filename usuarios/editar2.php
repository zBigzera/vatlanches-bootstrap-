<?php
    include '../conexao.php';
    $cod = $_POST['cod'];
     $nome=$_POST['nome'];
        $cpf=$_POST['cpf'];
        $mail=$_POST['mail'];
        $celular=$_POST['tel'];
        $end =   $_POST['end'];

    $sql = "UPDATE tbcliente SET nome= '$nome', cpf='$cpf',email='$mail',telefone='$celular',endereco='$end' WHERE codigocliente='$cod' ";

    if($con->query($sql) === TRUE){
        echo "Usuário alterado com sucesso<br>";
        echo "<a href=index.html>Voltar</a>";
    }
    else{
        echo "Erro: ". $sql. "<br>".$con->error;
        echo "<br><a href=encomenda.php>Voltar</a>";
    }
    $con->close();
?>