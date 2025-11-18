<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "quiz";

try{
    $pdo = new PDO("mysql:host=$host",$user,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão estabelecida . <br>";

    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "Banco de dados '$dbname' verificado/criado com sucesso <br>";

    $pdo->exec("USE $dbname");
    $pdo->exec("
    CREATE TABLE IF NOT EXISTS users(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(225) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
    ");

    echo "Tabela users criada/verificada <br>";

    $pdo->exec("
    CREATE TABLE IF NOT EXISTS categories(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(225) NOT NULL UNIQUE
    );
    ");

    echo "Tabela categories criada/verificada <br>";

    $pdo->exec("
    CREATE TABLE IF NOT EXISTS questions(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category_id INT UNSIGNED NOT NULL,
    question TEXT NOT NULL,
    option_a VARCHAR(225) NOT NULL,
    option_b VARCHAR(225) NOT NULL,
    option_c VARCHAR(225) NOT NULL,
    option_d VARCHAR(225) NOT NULL,
    correct_option ENUM ('A', 'B', 'C', 'D') NOT NULL,
    created_by INT UNSIGNED,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (created_by) REFERENCES users(id)
    );
    ");

    echo "Tabela questions criada/verificada <br>";
    echo "<br> <strong>Banco de dados configurado com sucesso</strong>";
}catch(PDOException $e){
    die("Erro: ". $e->getMessage());
}
?>