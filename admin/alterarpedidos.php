<?php
        include '../verificaloginadm.php';
        include '../conexao.php';
        $sql=mysqli_query($con, "UPDATE `tbencomenda` SET `status`='$_REQUEST[status]' WHERE codigoencomenda=$_REQUEST[cod]"); 
         header('location:pedidos.php');
        
?>