<?php session_start(); ?>
<html>
    <head>
        <title>Sistema Administrativo</title>
    </head>
    <body>
        <?php
        include '../conexao.php';

        
        $codigocliente=$_SESSION['codigo'];
		$data=date("Y-m-d");
		$status="em processamento";
        
        $sql = "INSERT INTO tbencomenda(codigocliente, data, status)VALUES ('$codigocliente', '$data', '$status')";
        
        echo"<center>";
        
        if (mysqli_query($con, $sql)) {
          echo "Seu pedido foi realizado!<br><br>";
          echo "<br><button><a href='encomenda.php'>Voltar</a></button>";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
        
        $ultimoCodigo = $con->insert_id;
        
        foreach($_REQUEST['quantidade'] as $key=>$quantidade)
		{
			if($quantidade>0){
				$cod=$_REQUEST['codigoproduto'][$key];
				$qtd=$_REQUEST['quantidade'][$key];
				
				$sql = "INSERT INTO tbitens(codigoencomenda, codigoproduto, quantidade)VALUES ($ultimoCodigo, $cod, $qtd)";
				mysqli_query($con, $sql);
				
			}
		}
        
        echo"</center>";
        ?>
    </body>
</html>