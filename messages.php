<?php

require_once 'config.php';

$secretPassword = "L0805V1104C1409";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $passwordTyped = $_POST['senha'];

    if ($passwordTyped === $secretPassword) {
        $sql = "SELECT * from dados";
        $result = $conn->query($sql);
    } else {
        echo "Senha Incorreta";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forms.css">
    <title>Dados</title>
</head>
<body>
    <form method="post">
        <div class="perguntas">
            <label for="senha">Senha</label> <br>
            <input type="password" name="senha" placeholder="Digite sua senha" required> <br>
            <button id="enviar" type="submit">Enviar</button>
        </div>
    </form>

    <?php
        if (isset($result) && $result->num_rows > 0) : ?>
    <h2>Mensagens</h2>
    <ul>
        <?php while ($row = $result->fetch_assoc()) : ?>
        <li>
            <strong> Nome: <strong> <?php echo $row["nome"]; ?> <br>
            <strong> Idade: <strong> <?php echo $row["idade"]; ?> <br>
            <strong> Qual hospital a pessoa doou: <strong> <?php echo $row["hospital"]; ?> <br>
            <strong> Se já havia doado antes: <strong> <?php echo $row["doou"]; ?> <br>
            <strong> Motivo da doação: <strong> <?php echo $row["motivo"]; ?> <br>
            <strong> Data e hora: <strong> <?php echo $row["data"]." às ".$row["hora"]; ?> <br>
        </li>
        <?php endwhile; ?>
    </ul>
    <?php else : ?>
        <p>Nenhuma mensagem encontrada. </p>
    <?php endif; ?>    

</body>
</html>