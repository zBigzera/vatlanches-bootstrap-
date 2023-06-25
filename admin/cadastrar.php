<html>
    <head>
        <title>Sistema Administrativo</title>
    </head>
    <body>
        <?php
        include '../conexao.php';
 
if(isset($_POST['enviarproduto'])){
  $nome=$_POST['nome'];
  $categoria=$_POST['cat'];
  $preco=$_POST['preco'];
  $sql = "INSERT INTO tbproduto(descricao, categoria, preco)VALUES ('$nome','$categoria','$preco')";
  echo"<center>";
  
  if (mysqli_query($con, $sql)) {
    echo "Você inseriu o produto $nome com sucesso!<br><br>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
  }  
      $ultimoCodigo = $con->insert_id;
      
    
        //UPLOAD DA IMAGEM
    
        $endereco = "../uplouds/";
        
         $target_path = $endereco . basename( $_FILES['uploadedfile']['name']); 
        
        $novoNome='Foto'.$ultimoCodigo.'.jpg';
        
        if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $endereco.$novoNome)) {
            echo "<br>Arquivo<b> ".  $endereco.$novoNome. 
            " </b>enviado com sucesso";
        } else{
            echo "<br>A imagem não foi enviada.";
        }
        
        echo"</center>";
}else if(isset($_POST['enviarcliente'])){

        $nome=$_POST['nome'];
        $cpf=$_POST['cpf'];
        $mail=$_POST['mail'];
        $celular=$_POST['tel'];
        $end =   $_POST['end'];
    
        $sql = "INSERT INTO tbcliente(nome, cpf, email, telefone, endereco)VALUES ('$nome', '$cpf','$mail','$celular','$end')";
        echo"<center>";
        
        if (mysqli_query($con, $sql)) {
          echo "Você inseriu o cliente $nome com sucesso!<br><br>";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
      }
       
    
        ?>
             <button><a href="index.php">Voltar</a></button>
    </body>
</html>