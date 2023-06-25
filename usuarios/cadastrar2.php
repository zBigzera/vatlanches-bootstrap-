<html>
    <head>
        <title>Sistema Administrativo</title>
    </head>
    <body>
        <?php
        include '../conexao.php';
 
        $nome=$_POST['nome'];
        $cpf=$_POST['cpf'];
        $mail=$_POST['mail'];
        $celular=$_POST['tel'];
        $end =   $_POST['end'];
    
        $sql = "INSERT INTO tbcliente(nome, cpf, email, telefone, endereco)VALUES ('$nome', '$cpf','$mail','$celular','$end')";
        
        echo"<center>";
        
        if (mysqli_query($con, $sql)) {
          echo "Cadastro realizado!!<br><br>";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    
        ?>
             <button><a href="login.php">Entrar</a></button>
    </body>
</html>