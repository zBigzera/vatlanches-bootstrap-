<?php
require_once "../verificaloginadm.php";
include '../conexao.php';

$tabela = isset($_GET['tabela']) ? $_GET['tabela'] : 'ambas';
    $q_clientes = mysqli_query($con, "SELECT * FROM tbcliente");
    $q_produtos = mysqli_query($con, "SELECT * FROM tbproduto");
    $mensagem = isset($_GET['mensagem']) ? $_GET['mensagem'] : "";
    
    if (isset($_GET['exclusao']) && $_GET['exclusao'] == 1) { ?>
        <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $mensagem; ?>
           <a href="index.php"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </a>
            <?php } ?>
        </div>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Área Administrativa</title>
    <link rel="stylesheet" href="style.css">
    </head>
<header>
<?php require_once "cabecalho.php"; ?>
</header>

<body>   

<div class="container">


    <?php switch($tabela){
        case "clientes": ?>
        
          <form method="post" action="cadastrar.php">
        
          <div class="row justify-content-center pb-4 pt-2">
    <div class="col-8 col-md-6 col-lg-4 border border-5 bg-white p-3">
            <fieldset>
                <legend class="text-center d-flex align-items-center justify-content-center">
                    Cadastrar
                    <span class="d-none d-sm-inline ms-2">Cliente</span>
                </legend>
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" required name="nome" class="form-control" id="nome" placeholder="Digite seu nome aqui">
                </div>
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" required name="cpf" class="form-control" id="cpf" placeholder="xxx.xxx.xxx-xx">
                </div>
                <div class="form-group">
                    <label for="mail">Email:</label>
                    <input type="text" required name="mail" class="form-control" id="mail" placeholder="emailteste@gmail.com">
                </div>
                <div class="form-group">
                    <label for="tel">Telefone:</label>
                    <input type="text" required name="tel" class="form-control" id="tel" placeholder="+99 (99) 99999-9999">
                </div>
                <div class="form-group">
                    <label for="end">Endereço:</label>
                    <input type="text" required name="end" class="form-control" id="end" placeholder="Estado -> Cidade -> Bairro -> Rua -> Número -> Complemento">
                </div>
                <div class="form-group pt-3">
                    <input type="submit" value="Cadastrar" name="enviarcliente" class="btn btn-primary w-100">
                </div>
            </fieldset>
    </div>
</div>
</form>
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th class="col-1 d-none d-md-table-cell">Código</th>
                <th class="col-2">Nome</th>
                <th class="col-1">CPF</th>
                <th class="col-2">E-mail</th>
                <th class="col-1">Telefone</th>
                <th class="col-3 d-none d-md-table-cell">Endereço</th>
                <th class="col-1">Editar</th>
                <th class="col-1">Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($q_clientes)) { ?>
                <tr>
                    <input type='hidden' name='codigocliente' value='<?= $row['codigocliente'] ?>'>
                    <td class="col-1 d-none d-md-table-cell"><?= $row['codigocliente'] ?></td>
                    <td class="col-2"><?= $row['nome'] ?></td>
                    <td class="col-1"><?= $row['cpf'] ?></td>
                    <td class="col-2"><?= $row['email'] ?></td>
                    <td class="col-1"><?= $row['telefone'] ?></td>
                    <td class="col-3 d-none d-md-table-cell"><?= $row['endereco'] ?></td>
                    <td class="col-1">
                        <a href="editar1.php?codigocliente=<?= $row['codigocliente'] ?>">
                            <button class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                                <span class="d-none d-md-inline">Editar</span>
                            </button>
                        </a>
                    </td>
                    <td class="col-1">
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal<?= $row['codigocliente'] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                </svg>
                                <span class="d-none d-md-inline">Excluir</span>
                            </button>
                    </td>
                </tr>
                <div class="modal fade" id="confirmDeleteModal<?= $row['codigocliente'] ?>" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmação de Exclusão</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Deseja realmente excluir o cliente?</p>
        </div>
      <!-- index.php -->
      <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
    <form action="excluir.php" method="post">
        <input type="hidden" name="codigocliente" value="<?= $row['codigocliente'] ?>">
        <button class="btn btn-danger" name="excluir">Excluir</button>
    </form>
</div>
    </div>
</div>

            <?php } ?>
        </tbody>
    </table>


</div>


<?php break;
case "produtos": ?>

    <div class="row justify-content-center pt-2 pb-4">
        <div class="col-12 col-md-8 col-lg-6 border border-5 bg-white p-3">
            <form method="post" action="cadastrar.php" enctype="multipart/form-data">
                <fieldset>
                    <legend class="text-center d-flex align-items-center justify-content-center">
                        Cadastrar
                        <span class="d-none d-sm-inline ms-2">Produto</span>
                    </legend>
                    <div class="form-group m-2">
                        <label for="nome">Nome:</label>
                        <input type="text" required name="nome" class="form-control" id="nome" placeholder="Digite o nome do produto">
                    </div>
                    <div class="form-group m-2">
                        <label for="cat">Categoria:</label>
                        <select name="cat" class="form-select">
                            <option value="Hamburguer">Hambúrgueres</option>
                            <option value="Pizza">Pizzas</option>
                            <option value="Bebidas">Bebidas</option>
                            <option value="Sobremesas">Sobremesas</option>
                        </select>
                    </div>
                    <div class="form-group m-2">
                        <label for="preco">Preço:</label>
                        <input type="number" min="0" required name="preco" step="0.01" class="form-control" id="preco" placeholder="0.00">
                    </div>
                    <div class="form-group m-2">
                    <label for="foto" class="form-label">Foto:</label>
                    <div class="input-group">
                     <input name="uploadedfile" type="file" id="foto" accept="image/*" class="form-control">
                    </div>

                    </div>
                    <div class="form-group pt-3">
                        <input type="submit" value="Cadastrar" name="enviarproduto" class="btn btn-primary w-100">
                    </div>
                </fieldset>
            </form>
            </div>
        </div>

    <div class="table-responsive">    <table class="table table-hover table-striped">
    <thead>
        <tr>
            <th class="col-1 d-none d-md-table-cell">Código</th>
            <th class="col-2 d-none d-lg-table-cell">Foto</th>
            <th class="col-2">Categoria</th>
            <th class="col-3">Descrição</th>
            <th class="col-1">Preço</th>
            <th class="col-1">Editar</th>
            <th class="col-1">Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_array($q_produtos)) { ?>
            <tr>
                <input type="hidden" name="codigoproduto" value="<?= $row['codigoproduto'] ?>">
                <td class="d-none d-md-table-cell"><?= $row['codigoproduto'] ?></td>
                <td class="d-none d-lg-table-cell">
                    <img src="https://aycav.000webhostapp.com/vatlanchesdefinitivo/vatlanchesFINALIZADO/uplouds/Foto<?= $row['codigoproduto'] ?>.jpg" class="product-image" alt="Foto do produto">
                </td>
                <td><?= $row['categoria'] ?></td>
                <td><?= $row['descricao'] ?></td>
                <td><?= $row['preco'] ?></td>
                <td>
                    <a href="editar1.php?codigoproduto=<?= $row['codigoproduto'] ?>">
                        <button class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                            <span class="d-none d-md-inline">Editar</span>
                        </button>
                    </a>
                </td>
                <td>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal<?= $row['codigoproduto'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                        </svg>
                        <span class="d-none d-md-inline">Excluir</span>
                    </button>
                </td>
            </tr>
            <!-- Modal de confirmação de exclusão -->
            <div class="modal fade" id="confirmDeleteModal<?= $row['codigoproduto'] ?>" tabindex="-1" aria-labelledby="confirmDeleteModalLabel<?= $row['codigoproduto'] ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel<?= $row['codigoproduto'] ?>">Confirmação de Exclusão</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Deseja realmente excluir o produto?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <form action="excluir.php" method="post">
                            <input type="hidden" name="codigoproduto" value="<?= $row['codigoproduto'] ?>">
                            <button class="btn btn-danger" name="excluir">Excluir</button>
        </form>
        </div>
    </div>
</div>

            <?php } ?>
        </tbody>
    </table>
    </div>
</div>
        <?php break; 
    case "ambas":?> <div class="table-responsive mt-5">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th class="col-1 d-none d-md-table-cell">Código</th>
                    <th class="col-2">Nome</th>
                    <th class="col-1">CPF</th>
                    <th class="col-2">E-mail</th>
                    <th class="col-1">Telefone</th>
                    <th class="col-3 d-none d-md-table-cell">Endereço</th>
                    <th class="col-1">Editar</th>
                    <th class="col-1">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($q_clientes)) { ?>
                    <tr>
                        <input type='hidden' name='codigocliente' value='<?= $row['codigocliente'] ?>'>
                        <td class="col-1 d-none d-md-table-cell"><?= $row['codigocliente'] ?></td>
                        <td class="col-2"><?= $row['nome'] ?></td>
                        <td class="col-1"><?= $row['cpf'] ?></td>
                        <td class="col-2"><?= $row['email'] ?></td>
                        <td class="col-1"><?= $row['telefone'] ?></td>
                        <td class="col-3 d-none d-md-table-cell"><?= $row['endereco'] ?></td>
                        <td class="col-1">
                            <a href="editar1.php?codigocliente=<?= $row['codigocliente'] ?>">
                                <button class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                    <span class="d-none d-md-inline">Editar</span>
                                </button>
                            </a>
                        </td>
                        <td class="col-1">
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal<?= $row['codigocliente'] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                </svg>
                                <span class="d-none d-md-inline">Excluir</span>
                            </button>
                    </td>
                </tr>
                <div class="modal fade" id="confirmDeleteModal<?= $row['codigocliente'] ?>" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmação de Exclusão</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Deseja realmente excluir o cliente?</p>
        </div>
      <!-- index.php -->
      <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
    <form action="excluir.php" method="post">
        <input type="hidden" name="codigocliente" value="<?= $row['codigocliente'] ?>">
        <button class="btn btn-danger" name="excluir">Excluir</button>
    </form>
</div>
    </div>
</div>

            <?php } ?>
        </tbody>
    </table>
    </div>
    
           <hr>
           <table class="table table-hover table-striped">
    <thead>
        <tr>
            <th class="col-1 d-none d-md-table-cell">Código</th>
            <th class="col-2 d-none d-lg-table-cell">Foto</th>
            <th class="col-2">Categoria</th>
            <th class="col-3">Descrição</th>
            <th class="col-1">Preço</th>
            <th class="col-1">Editar</th>
            <th class="col-1">Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_array($q_produtos)) { ?>
            <tr>
                <input type="hidden" name="codigoproduto" value="<?= $row['codigoproduto'] ?>">
                <td  class="d-none d-md-table-cell"><?= $row['codigoproduto'] ?></td>
                <td  class="d-none d-lg-table-cell">
                    <img src="https://aycav.000webhostapp.com/vatlanchesdefinitivo/vatlanchesFINALIZADO/uplouds/Foto<?= $row['codigoproduto'] ?>.jpg" class="product-image" alt="Foto do produto">
                </td>
                <td><?= $row['categoria'] ?></td>
                <td><?= $row['descricao'] ?></td>
                <td><?= $row['preco'] ?></td>
                <td>
    <a href="editar1.php?codigoproduto=<?= $row['codigoproduto'] ?>">
        <button class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
            </svg>
            <span class="d-none d-md-inline">Editar</span>
        </button>
    </a>
</td>
<td>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal<?= $row['codigoproduto'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                        </svg>
                        <span class="d-none d-md-inline">Excluir</span>
                    </button>
                </td>
            </tr>
            <!-- Modal de confirmação de exclusão -->
            <div class="modal fade" id="confirmDeleteModal<?= $row['codigoproduto'] ?>" tabindex="-1" aria-labelledby="confirmDeleteModalLabel<?= $row['codigoproduto'] ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel<?= $row['codigoproduto'] ?>">Confirmação de Exclusão</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Deseja realmente excluir o produto?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <form action="excluir.php" method="post">
                            <input type="hidden" name="codigoproduto" value="<?= $row['codigoproduto'] ?>">
                            <button class="btn btn-danger" name="excluir">Excluir</button>
        </form>
        </div>
    </div>
</div>

            <?php } ?>
        </tbody>
    </table>
        
           <?php break; 
        default:?>
        <table>
        <thead>
               <tr>
                   <th>Código do cliente</th>
                   <th>Nome</th>
                   <th>CPF</th>
                   <th>E-mail</th>
                   <th>Telefone</th>
                   <th>Endereço</th>
                   <th>Editar</th>
                   <th>Excluir</th>
               </tr>
        </thead><tbody>
               <?php while($row=mysqli_fetch_array($q_clientes)){ ?>
                   <tr>
                       <input type='hidden' name='codigocliente' value='$row[codigocliente]'>
                       <td><?=$row['codigocliente']?></td>
                       <td><?=$row['nome']?></td>
                       <td><?=$row['cpf']?></td>
                       <td><?=$row['email']?></td>
                       <td><?=$row['telefone']?></td>
                       <td><?=$row['endereco']?></td>
                       <td><a href="editar1.php?codigocliente=<?=$row['codigocliente']?>"><button style='width:100% ; height:100%'>Editar</button></a></td>
                       <td><a href="excluir.php?codigocliente=<?=$row['codigocliente']?>"><button style='width:100% ; height:100%'>Excluir</button></a></td>
                   </tr>
               <?php } ?>
               </tbody>
           </table>
           <br><hr>
           <table>
                 <thead>
            <tr>
                <td>Codigo Produto</td>
                <td>Categoria</td>
                <td>Descrição</td>
                <td>Preço</td>
                <td>Editar</td>
                <td>Excluir</td>
            </tr>
            </thead><tbody>
            <?php while($row=mysqli_fetch_array($q_produtos)){ ?>
                <tr>
                    <input type='hidden' name='codigoproduto' value='$row[codigoproduto]'>
                    <td><?=$row['codigoproduto']?></td>
                    <td><?=$row['categoria']?></td>
                    <td><?=$row['descricao']?></td>
                    <td><?=$row['preco']?></td>
                    <td><a href="editar1.php?codigoproduto=<?=$row['codigoproduto']?>"><button style='width:100% ; height:100%'>Editar</button></a></td>
                    <td><a href="excluir.php?codigoproduto=<?=$row['codigoproduto']?>"><button style='width:100% ; height:100%'>Excluir</button></a></td>
                </tr>
                <?php } ?>
            </tbody></table>
         <?php } ?>
    
            </ul>
</tbody>
            </body>
</html>
