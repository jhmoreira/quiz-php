<?php
session_start();
require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../resources/layout/header.php";

if(!isset($_SESSION['quiz_questions'])|| !isset($_SESSION['quiz_index'])){
    header('Location: index.php');
    exit;
}

$questions = $_SESSION['quiz_questions'];
$current = $_SESSION['quiz_index'];
$totalQuestions = count($questions);

if($_SERVER['REQUEST_METHOD']==="POST" && isset($_POST['answer'])){
    $selected = $_POST['answer'];
    $corrrect = $questions[$current]['correct_option'];
    if($selected === $corrrect){
        $difficulty = $questions[$current]['difficulty'];
        $points =[
            'easy' => 1,
            'medium'=> 2,
            'hard' => 3

        ];
        $_SESSION['quiz_score']+=$points[$difficulty];
    }
    $_SESSION['quiz_index']++;
    if($_SESSION['quiz_index']>= $totalQuestions){
        header('Location: result.php');
        exit();
    }
}

$question = $questions[$current];
?>

<div class="quiz-container">
    <h2>Pergunta <?php echo $current +1?> de <?echo $totalQuestions;?></h2>
    <p class="question-text"><?echo $question['question']?></p>

    <form method="POST">
        <button class="option-btn" name="answer" value="A"><?php echo $question['option_a'];?></button>
        <button class="option-btn" name="answer" value="B"><?php echo $question['option_b'];?></button>
        <button class="option-btn" name="answer" value="C"><?php echo $question['option_c'];?></button>
        <button class="option-btn" name="answer" value="D"><?php echo $question['option_d'];?></button>
    </form>
</div>
<?php require_once __DIR__ . "/../resources/layout/footer.php"; ?>