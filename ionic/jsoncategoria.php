<?php
header('Content-type: application/json');
header("Access-Control-Allow-Origin: *"); 

include '../conexao.php';

$data=array(); 
if(isset($_REQUEST['tipo'])){
$q=mysqli_query($con, "SELECT * FROM tbproduto where categoria='$_REQUEST[tipo]' order by descricao"); 
}else{
    $q=mysqli_query($con, "SELECT * FROM tbproduto order by descricao, categoria"); 
}

while ($row=mysqli_fetch_array($q)){		
    $data[]=$row; 
}
echo json_encode($data); 

?>