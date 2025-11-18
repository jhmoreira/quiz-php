<?php
function getConnection(){
define('DB_HOST', 'localhost');
define('DB_NAME', 'quiz');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try{
    $pdo = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASSWORD,$options);
    return $pdo;
}catch(PDOException $e){
    $pdo = NULL;
}
}

?>