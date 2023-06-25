<?php
require_once "../verificalogin.php";
include '../conexao.php';

?>
<html> 
    <head>
        <meta charset="utf-8">
        <title>Alteração de cadastro</title>
    </head>
    <body>
        <form method="POST" action="editar2.php">
            <?php 
            include '../conexao.php';
            if(isset($_SESSION['cpf'])){
                include '../conexao.php';
                 $cpf = $_SESSION['cpf'];
                 $nome = $_SESSION['nome'];
            }
            $sql = "SELECT * FROM tbcliente WHERE cpf='$cpf'";
            $select = $con-> query($sql);
            if($select){
                while($linha = mysqli_fetch_array($select)){
                    $cod = $linha['codigocliente'];
                    $nome = $linha['nome'];
                    $cpf = $linha['cpf'];
            $email = $linha['email'];
            $tel = $linha['telefone'];
            $end = $linha['endereco'];
         
            
            
                }
            }
            else{  echo "Erro: ". $sql . "<br>" . $conexao->error; echo "<a href=../home.html>Voltar</a>";}
            ?>
       <label>Nome:</label><input type="text" required name="nome" value="<?=$nome?>">
       <br>
    <label> Cpf:</label><input type="text" required name="cpf" value="<?=$cpf?>">
      <br>
    <label>Email:</label><input type="text" required name="mail" value="<?=$email?>">
 <br>
    <label>Telefone:</label><input type="text" required name="tel" value="<?=$tel?>" placeholder="+99 (99) 99999-9999">
     <br>
    <label>Endereço:</label><input type="text" required name="end" placeholder="Estado -> Cidade -> Bairro -> Rua -> Número -> Complemento" value="<?=$end?>">
            <input type="hidden" value="<?=$cod?>" name="cod">
            <input type="submit" value="Alterar" name="Enviar">
        </form>
        <?php  $con->close(); ?>
    </body>
</html>
