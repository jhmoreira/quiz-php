<?php
if(session_status()===PHP_SESSION_NONE){
    session_start();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>QUIZ PHP</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="../resources/css/style.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <div class="container">
                <a href="/index.php" class="navbar-brand">Quiz PHP</a>
                <div>
            <?php if(isset($_SESSION['user_id'])):?>
                <a href="/public/logout.php" class="btn btn-sm btn-outline-primary">Sair</a>
                <?php else: ?>
                    <a href="/public/login.php" class="btn btn-sm btn-primary">Entrar</a>
                    <a href="/public/register.php" class="btn btn-sm btn-outline-secondary">Cadastrar</a>
                <?php endif;?>
               </div>     
            </div>   
        </nav>
        <div class="container">           
