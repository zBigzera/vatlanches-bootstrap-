<?php
session_start();
$login = "adm";
$senha = "adm";
if(isset($_SESSION["useradm"]) && $_SESSION["useradm"] == $login) { 
    header('Location:index.php'); 
    die(); 
}

if(isset($_POST["enviar"])){
    if($_POST['login'] == $login && $_POST['senha'] == $senha){
        $_SESSION['useradm'] = $_POST['login'];
        header("Location: login.php");
    } else { 
        $msg_erro = "Usuário inválido. Por favor, tente novamente."; 
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Painel de Login</title>
    <?php include "../bootstrap.html";?>
    
    <link rel="stylesheet" href="style.css">
</head>

<body class="body-type p-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="border border-4 rounded-4 bg-light p-4">
                    <h1 class="text-center d-none d-sm-block">Painel de Login</h1>
                    <p class="text-center fs-4 d-none d-sm-block">Área Administrativa</p>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <?php if(!empty($msg_erro)) { ?>
                            <div class="alert alert-danger"><?php echo $msg_erro; ?></div>
                        <?php } ?>

                        <div class="mb-3">
                            <label for="login" class="form-label fs-5">Login:</label>
                            <input type="text" name="login" id="login" class="form-control" placeholder="Insira um login aqui" required>
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="form-label fs-5">Senha:</label>
                            <input type="password" name="senha" id="senha" class="form-control" placeholder="Insira sua senha aqui" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="enviar" class="btn btn-primary w-100">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


</html>
