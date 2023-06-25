<?php
header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
include '../conexao.php';
$data=array();        
$q=mysqli_query($con, "SELECT * FROM tbproduto ORDER BY codigoproduto DESC LIMIT 2"); 

while ($row=mysqli_fetch_array($q)){		
    $data[]=$row; 
}
echo json_encode($data); 

?>