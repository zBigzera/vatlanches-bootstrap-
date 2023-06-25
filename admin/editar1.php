<?php
require_once "../verificaloginadm.php";
include '../conexao.php';
require_once 'cabecalho.php';
if(isset($_REQUEST['codigocliente'])){
           $q= mysqli_query($con, "SELECT * from tbcliente where codigocliente=$_REQUEST[codigocliente]");    
                while($row=mysqli_fetch_array($q)){
                    $tabela = 0;
                        $cod = $row['codigocliente'];
                        $nome = $row['nome'];
                        $cpf = $row['cpf'];
                        $email = $row['email'];
                        $tel = $row['telefone'];
                        $end = $row['endereco'];
                    
                }
                }else if(isset($_REQUEST['codigoproduto'])){
                    $q= mysqli_query($con, "SELECT * from tbproduto where codigoproduto=$_REQUEST[codigoproduto]");    
           while($row=mysqli_fetch_array($q)){
               $tabela =1 ;
                    $cod = $row['codigoproduto'];
                    $nome = $row['descricao'];
                    $categoria = $row['categoria'];
            $preco = $row['preco'];
                }}
               
                else {echo("Um erro inesperado aconteceu, <a href='index.php'>Voltar</a>");}
    
?>
<html> 
    <head>
        <meta charset="utf-8">
        <title>Alteração de cadastro</title>
        
      
    </head>
    
</head>

<body>
    <div class="container">
        <?php switch ($tabela) {
            case 0:
        ?>
                <form method="POST" action="editar2.php">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" required name="nome" id="nome" class="form-control" value="<?= $nome ?>">
                    </div>
                    <div class="form-group">
                        <label for="cpf">Cpf:</label>
                        <input type="text" required name="cpf" id="cpf" class="form-control" value="<?= $cpf ?>">
                    </div>
                    <div class="form-group">
                        <label for="mail">Email:</label>
                        <input type="text" required name="mail" id="mail" class="form-control" value="<?= $email ?>">
                    </div>
                    <div class="form-group">
                        <label for="tel">Telefone:</label>
                        <input type="text" required name="tel" id="tel" class="form-control" value="<?= $tel ?>" placeholder="+99 (99) 99999-9999">
                    </div>
                    <div class="form-group">
                        <label for="end">Endereço:</label>
                        <input type="text" required name="end" id="end" class="form-control" placeholder="Estado -> Cidade -> Bairro -> Rua -> Número -> Complemento" value="<?= $end ?>">
                    </div>
                    <input type="hidden" value="<?= $cod ?>" name="codigocliente">
                    <input type="submit" value="Alterar" name="Enviar" class="btn btn-primary">
                </form>
            <?php
                break;
            case 1:
            ?>
                <form method="POST" action="editar2.php">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" required name="nome" id="nome" class="form-control" value="<?= $nome ?>">
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoria:</label>
                        <input type="text" required name="categoria" id="categoria" class="form-control" value="<?= $categoria ?>">
                    </div>
                    <div class="form-group">
                        <label for="preco">Preço:</label>
                        <input type="text" required name="preco" id="preco" class="form-control" value="<?= $preco ?>">
                    </div>
                    <input type="hidden" value="<?= $cod ?>" name="codigoproduto">
                    <input type="submit" value="Alterar" name="Enviar" class="btn btn-primary">
                </form>
            <?php
                break;
            default:
                echo("Um erro inesperado aconteceu, <a href='index.php'>Voltar</a>");
                break;
        }
        $con->close();
            ?>
    </div>
    </body>
