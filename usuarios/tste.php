<?php 
include '../conexao.php';
require_once "../verificalogin.php";
$q= mysqli_query($con, "SELECT * FROM tbproduto");
?>
<html>
    <head>
        <title>Área Administrativa</title>
        <link rel="stylesheet" href="style.css">
        <meta charset="UTF-8">
    </head>
   <body style="text-align: center;">
    <h1>VAT-Lanches!</h1>
    <hr>
    <div align="center">
        <a href="encomendas.php">Encomendas</a>     <a href="pedidos.php">Pedidos</a>     <a href="editar1.php">Perfil</a>    <a href="logout.php">Sair</a>
    </div>
          <center>
              <form method="POST" action="encomenda2.php">              <table border=1>
                  <tr>
                      <td>Produto</td>
                      <td>Quantidade</td>
                  </tr>
                  <tr>
                      <td><select name="asdfvasb">
                          <?php while($row=mysqli_fetch_array($q)){
                            ?><option value="<?=$row["descricao"]?>"><?=$row["descricao"]?></option><?php
                            
                          }
                          ?>
                      </select></td>
                  
                        <td><input type='number' value='0' name='quantidade[]' min='0'></input></td>
                    </tr>
                  </table>
                     <input type="submit" value="Enviar" name="Enviar">
                  </form>

          </center>
    </body>
</html>
