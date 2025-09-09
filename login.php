<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login no Sistema</title>
</head>
<body>
    <p>Digite os dados</p>

    <form action="validarlogin.php" name="formlogin" method="post">
        <label tue>Usuario</label><br>
        <input type="text" name="usuario" maxlength="20" placeholder="Digite o usuario" size="22" required><br>

        <label tue>Senha</label><br>
        <input type="password" name="usuario" maxlength="20" placeholder="Digite o usuario" size="22" required><br><br>

        <input type="submit" value="Acessar">
        <input type="reset" value="Limpar">
    </form>


</body>
</html>