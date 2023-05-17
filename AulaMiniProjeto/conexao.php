<?php
$bd = 'Mini_Projeto_PHP';
$host = 'localhost';
$user = 'root';
$pass = '';

try {
    $conn = new PDO("mysql:dbname=$bd;host=$host", $user, $pass); //inicializa uma classe de conexao
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //permite que façamos tratamento de erros
    $conn->exec("set names utf8"); //acentuação
} catch (PDOException $ex) {
    echo $ex->getMessage();
}

?>