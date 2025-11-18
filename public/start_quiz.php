<?php
session_start();
require_once __DIR__ . "/../config/database.php";

$level = $_GET['level']?? NULL;
if(!$level){
    header("Location: index.php");
    exit;
}
$pdo = getConnection();
$sql = "SELECT * from questions WHERE difficulty = :level ORDER BY RAND() LIMIT 5";
$query = $pdo->prepare($sql);
$query->bindValue(":level", $level);
$query->execute();
$questions = $query->fetchAll(PDO::FETCH_ASSOC);
if(empty($questions)){
    echo "<h2> Nenhuma pergunta encontrada para o nivel selecionado";
    exit;
}

$_SESSION['quiz_questions'] = $questions;
$_SESSION['quiz_score'] = 0;
$_SESSION['quiz_index'] = 0;
$_SESSION['quiz_level'] = $level;

header("Location:quiz.php");
exit;

?>