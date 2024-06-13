<?php

$secretPassword = "123";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $passwordTyped = $_POST['senha'];

    if ($passwordTyped === $secretPassword) {
        
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados</title>
</head>
<body>
    <form method="post">
        <label for="senha">Senha</label> <br>
        <input type="password" name="senha" placeholder="Digite sua senha" required> <br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>