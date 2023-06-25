<?php
include '../conexao.php';

function excluir() {
    global $con; 

    if (isset($_POST['excluir'])) { 
        if (isset($_POST['codigocliente'])) {
            $cliente = $_POST['codigocliente'];
            $sql = "DELETE FROM tbcliente WHERE codigocliente=$cliente";
        } else if (isset($_POST['codigoproduto'])) {
            $produto = $_POST['codigoproduto'];
            $sql = "DELETE FROM tbproduto WHERE codigoproduto=$produto";
        } else if (isset($_POST['delreg'])) {
            $encomenda = $_POST['delreg'];
            $sql = "DELETE FROM tbencomenda WHERE codigoencomenda=$encomenda";
        } else {
            echo "Um erro inesperado aconteceu, <a href='index.php'>Voltar</a>";
            return;
        }

        if ($con->query($sql) === TRUE) {
            if (isset($cliente)) {
                $mensagem = "Usuário excluído com sucesso!";
                header("Location: index.php?exclusao=1&mensagem=".urlencode($mensagem));
            } else if (isset($produto)) {
                $mensagem = "Produto excluído com sucesso!";
                header("Location: index.php?exclusao=1&mensagem=".urlencode($mensagem));
            } else if (isset($encomenda)) {
                $mensagem = "Encomenda excluída com sucesso!";
                header("Location: index.php?exclusao=1&mensagem=".urlencode($mensagem));
            } else {
                $mensagem = "Item excluído com sucesso!";
            }
        } else {
            $mensagem = "Erro: " . $sql . "<br>" . $con->error;
        }
        return $mensagem;
    }
}
$mensagem = excluir();


?>
