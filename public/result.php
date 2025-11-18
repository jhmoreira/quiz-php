<?php
session_start();
require_once __DIR__ . "/../resources/layout/header.php";

if(!isset($_SESSION['quiz_score'])|| !isset($_SESSION['quiz_level'])){
    header("Location:index.php");
    exit;
}

$score = $_SESSION['quiz_score'];
$level = $_SESSION['quiz_level'];

unset($_SESSION['quiz_score']);
unset($_SESSION['quiz_questions']);
unset($_SESSION['quiz_index']);
unset($_SESSION['quiz_levels']);
?>
<div class="container result-container">
    <h1>Fim do Jogo</h1>
    <p>Você completou o nivel selecionado</p>
    <p>Sua pontuação foi:<strong><?php echo $score;?></strong></p>
    <a href="index.php"> Voltar para o inicio</a>
</div>
<?php require_once __DIR__ . "/../resources/layout/footer.php"; ?>