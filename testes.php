<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel de Login</title>
    <?php include '../bootstrap.html'; ?>
    <style>
        .center-box {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Defina a altura desejada para a caixa */
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="p-3 mb-2 bg-light text-dark center-box">
            <h1 class="mt-5">Painel de Login</h1>
            <form action="login.php" method="POST">
                <?php if(isset($msg_erro)) { ?>
                    <div class="alert alert-danger"><?php echo $msg_erro; ?></div>
                <?php } ?>
                <div class="mb-3">
                    <label for="login" class="form-label">Login:</label>
                    <input type="text" name="login" id="login" class="form-control" placeholder="Insira um login aqui">
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha:</label>
                    <input type="password" name="senha" id="senha" class="form-control" placeholder="Insira sua senha aqui">
                </div>
                <button type="submit" name="enviar" class="btn btn-primary">Entrar</button>
            </form>
        </div>
    </div>
</body>
</html>
