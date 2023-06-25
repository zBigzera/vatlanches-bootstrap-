<?php
    include '../conexao.php';
    if(isset($_REQUEST['codigocliente'])){
    $cod = $_REQUEST['codigocliente'];
     $nome=$_POST['nome'];
        $cpf=$_POST['cpf'];
        $mail=$_POST['mail'];
        $celular=$_POST['tel'];
        $end =   $_POST['end'];
    
    $q = "UPDATE tbcliente SET nome= '$nome', cpf='$cpf',email='$mail',telefone='$celular',endereco='$end' WHERE codigocliente='$cod' ";
  $sql = mysqli_query($con, $q);

    }elseif(isset($_REQUEST['codigoproduto'])){
        $cod = $_REQUEST['codigoproduto'];
        $nome=$_POST['nome'];
           $categoria=$_POST['categoria'];
           $preco=$_POST['preco'];
           $q = "UPDATE tbproduto SET descricao= '$nome', categoria='$categoria',preco='$preco' WHERE codigoproduto='$cod' ";
           $sql = mysqli_query($con, $q);
    }





    if($sql== TRUE){
        if(isset($_REQUEST['codigocliente'])) {
            ?>
           <div style="margin:auto;margin-top:10%;text-align:center;border: 1px solid #ccc; background-color: #f5f5f5; padding: 10px; margin-bottom: 10px; width: 50%; height:25%;">
                <p style="margin: 0;">Usuário alterado com sucesso!</p>
                <a href="index.php" style="text-decoration: none;"><button style="padding: 5px 10px; background-color: #4CAF50; color: white; border: none; border-radius: 3px; cursor: pointer;">Voltar</button></a>
            </div>
            <?php
        } else if($_REQUEST['codigoproduto']){
            ?>
            <div style="margin:auto;margin-top:10%;text-align:center;border: 1px solid #ccc; background-color: #f5f5f5; padding: 10px; margin-bottom: 10px; width: 50%; height:25%;">
                <p style="margin: 0;">Produto alterado com sucesso!</p>
                <a href="index.php" style="text-decoration: none;"><button style="padding: 5px 10px; background-color: #4CAF50; color: white; border: none; border-radius: 3px; cursor: pointer;">Voltar</button></a>
            </div>
            <?php
        }
    else {
        ?>
        <div style="border: 1px solid #ccc; background-color: #f5f5f5; padding: 10px; margin-bottom: 10px;">
            <p style="margin: 0; color: red;">Erro: <?php echo $sql . "<br>" . $con->error; ?></p>
            <a href="index.php" style="text-decoration: none;"><button style="padding: 5px 10px; background-color: #4CAF50; color: white; border: none; border-radius: 3px; cursor: pointer;">Voltar</button></a>
        </div>
        <?php
    }
    }
    $con->close();
?>