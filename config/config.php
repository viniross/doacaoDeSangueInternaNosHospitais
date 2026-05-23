<?php 

$server = 'localhost';
$usuario = 'root';
$senha = '';
$bd = 'ibdhosp';

$conn = new mysqli($server , $usuario, $senha, $bd);

if ($conn->connect_error) {
    die("Falha ao se comunicar com o banco de dados: ".$conn->connect_error);   
}

?>