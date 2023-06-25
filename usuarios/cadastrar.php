<!DOCTYPE html>
<html lang="PT">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>
<body style="text-align: center;">
    <h1>Cadastre-se!</h1>
    <hr>
    <form method="Post" action="cadastrar2.php"> 
   <fieldset style="width: 50%; margin: auto;">

<legend> Dados </legend>
    <label>Nome:</label><input type="text" required name="nome" placeholder="Digite seu nome aqui">
    <br>
    <label> Cpf:</label><input type="text" required name="cpf" placeholder="xxx.xxx.xxx-xx">
    <br>
    <label>Email:</label><input type="text" required name="mail" placeholder="emailteste@gmail.com">
    <br>
    <label>Telefone:</label><input type="text" required name="tel" placeholder="+99 (99) 99999-9999">
    <br>
    <label>Endereço:</label><input type="text" required name="end" placeholder="Estado -> Cidade -> Bairro -> Rua -> Número -> Complemento">
    <br><br>
    <input type="submit" value="Cadastrar" name="enviar">    
</fieldset>
</form>
</body>
</html>