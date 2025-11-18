<?php
require_once __DIR__ . "/../resources/layout/header.php";
?>
<div class="container">
    <h1>Quiz PHP</h1>
    <p>Selecione o nível de dificuldade para começar</p>
    <div class="level-cards">
        <a href="start_quiz.php?level=easy" class="card level-easy">
            <h2>Fácil</h2>
            <p>+1 ponto por acerto</p>
        </a>
    
        <a href="start_quiz.php?level=medium" class="card level-medium">
            <h2>Médio</h2>
            <p>+2 ponto por acerto</p>
        </a>
   
    
        <a href="start_quiz.php?level=hard" class="card level-hard">
            <h2>Difícil</h2>
            <p>+3 ponto por acerto</p>
        </a>
    </div>
</div>
<?php
require_once __DIR__ . "/../resources/layout/footer.php";