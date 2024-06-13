<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $age = $_POST['age'];
    $hospital= $_POST['hospital'];
    $donated = $_POST['donated'];
    $reason = $_POST['reason'];
    $data_atual = date('d/m/Y');
    $hora_atual = date('H:i:s');

    $server = 'localhost';
    $usuario = 'root';
    $senha = '';
    $bd = 'ibdhosp';

    $conn = new mysqli($server , $usuario, $senha, $bd);

    if ($conn->connect_error) {
        die("Falha ao se comunicar com o banco de dados: ".$conn->connect_error);   
    }

    $smtp = $conn->prepare("INSERT INTO dados (nome, idade, hospital, doou, motivo, data, hora) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $smtp->bind_param("sssssss", $fname, $age, $hospital, $donated, $reason, $data_atual, $hora_atual);

    if ($smtp->execute()) {
        echo "Formulário enviado com sucesso!";
    } else {
        echo "Erro no envio do formulário: ".$smtp->error;
    }

    $smtp->close();
    $conn->close();

} else {
    echo "Formulário não foi enviado corretamente.";
}
?>