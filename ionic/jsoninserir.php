<?php

header('Content-type: application/json');
header("Access-Control-Allow-Origin: *"); 

include '../conexao.php';
$data = array();

$clienteId = $_REQUEST['clienteId'];
$itens = $_REQUEST['itens'];
$status = $_REQUEST['status'];

// Obter informações do cliente
$queryCliente = "SELECT * FROM tbcliente WHERE codigocliente = $clienteId";
$resultCliente = mysqli_query($con, $queryCliente);
$cliente = mysqli_fetch_assoc($resultCliente);

if (!$cliente) {
  $data[] = "Cliente não encontrado!";
  echo json_encode($data);
  exit;
}

// Inserir novo pedido
$queryInsertPedido = "INSERT INTO tbencomenda (codigocliente, data, status) VALUES ($clienteId, NOW(), '$status')";
if (mysqli_query($con, $queryInsertPedido)) {
  $pedidoId = mysqli_insert_id($con);

  // Inserir itens do pedido
  foreach ($itens as $item) {
    $produtoId = $item['produtoId'];
    $quantidade = $item['quantidade'];

    $queryInsertItem = "INSERT INTO tbitens (codigoencomenda, codigoproduto, quantidade) VALUES ($pedidoId, $produtoId, $quantidade)";
    mysqli_query($con, $queryInsertItem);
  }

  $data[] = "Pedido inserido com sucesso!";
} else {
  $data[] = "Erro ao inserir o pedido: " . mysqli_error($con);
}

echo json_encode($data);

?>