<?php
require_once "../verificaloginadm.php";
include '../conexao.php';
$mensagem = isset($_GET['mensagem']) ? $_GET['mensagem'] : "";
if (isset($_GET['exclusao']) && $_GET['exclusao'] == 1) { ?>
    <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $mensagem; ?>
       <a href="pedidos.php"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">

            <span aria-hidden="true">&times;</span>
        </button>
        </a>
    </div>
    <?php }
$q=mysqli_query($con, "SELECT tbproduto.descricao as nomeproduto, 

tbproduto.preco as precoproduto,
tbcliente.nome as nomecliente,
tbencomenda.codigoencomenda, 
                         tbencomenda.data, 
                         tbencomenda.status
FROM  tbproduto, tbencomenda, tbcliente
WHERE tbcliente.codigocliente = tbencomenda.codigocliente
GROUP BY codigoencomenda
");
$total = 0;

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Área Administrativa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <?php require_once "cabecalho.php"; ?>
</head>
<body>  
    <div class="container">
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Código Encomenda</th>
                    <th>Cliente</th>
                    <th>Data</th>
                    <th>Itens</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($q)) { ?>
                <tr>
                    <td><?=$row['codigoencomenda'] ?></td>
                    <td><?= $row['nomecliente']  ?></td>
                    <td><?= $row['data'] ?></td>
                    <td>
                        <?php 
                        $q2 = mysqli_query($con, "SELECT * FROM tbitens, tbproduto WHERE codigoencomenda=$row[codigoencomenda] AND tbitens.codigoproduto=tbproduto.codigoproduto"); 
                        ?>
                        <table class="table table-bordered">
                            <?php
                            $total = 0;
                            while ($row2 = mysqli_fetch_array($q2)) {
                                echo "<tr><td>$row2[descricao]</td><td>R$ $row2[preco]</td><td>$row2[quantidade]</td></tr>";
                                $total = $total + $row2['preco'] * $row2['quantidade'];
                            }
                            ?>
                        </table>
                        <b><span>R$ <?= $total ?></span></b>
                    </td>
                    <td>
                        <form action="alterarpedidos.php" method="POST">
                            <input type="hidden" name="cod" value="<?= $row['codigoencomenda'] ?>">
                            <select name="status" class="form-select" onchange='form.submit()'>
                                <option selected value="<?= $row['status']?>"><?= $row['status']?></option>
                                <option value="Preparando">Preparando...</option>
                                <option value="Enviado">Pedido enviado</option>
                                <option value="Finalizado">Pedido Finalizado</option>
                                <option value="Cancelado">Pedido Cancelado</option>
                            </select>
                        </form>
                        <div class="d-flex justify-content-between align-items-center">
                        <form action="excluir.php" method="post">
                        <input type="hidden" name="delreg" value="<?=$row['codigoencomenda']?>">
                           <button  name="excluir" class="btn btn-danger">Excluir</button>
                            </form>
                        </div>
            

                    </td>
                </tr>
                
                <?php } ?>
            </tbody>
        </table><br>
    </div>
    </div>
       
    </body>
</html>
