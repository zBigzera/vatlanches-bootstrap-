<?php require_once "../verificalogin.php";; ?>
<html>
    <head>
        <title>Sistema Administrativo</title>
    </head>
    <body>
        <?php
        include '../conexao.php';
        $codigocliente = $_SESSION['codigo'];
        $q=mysqli_query($con, "SELECT * FROM tbencomenda WHERE codigocliente='$codigocliente'");
        ?>
        
        <center>
            <table border=1>
                <tr><td>Código</td><td>Data</td><td>Itens</td><td>Status</td></tr>
                  <?php
                while ($row=mysqli_fetch_array($q)){		
                    echo "<tr><td>$row[codigoencomenda]</td><td>$row[data]</td><td>";
					
					$q2=mysqli_query($con, "SELECT * FROM tbitens,tbproduto WHERE codigoencomenda=$row[codigoencomenda] and tbitens.codigoproduto=tbproduto.codigoproduto"); 
					echo "<table border=1 width=100%>";
					$total=0;
					while ($row2=mysqli_fetch_array($q2)){
						echo "<tr><td>$row2[descricao]</td><td>R$ $row2[preco]</td><td>$row2[quantidade]</td></tr>";
						$total=$total+$row2['preco']*$row2['quantidade'];
					}
	
					echo "</table>";
					echo "<b><font>R$ $total</font></b>";
					echo "</td><td>$row[status]</td></tr>"; 
                }
                ?>
            </table><br>
        </center>
    </body>
</html>