<?php
require_once "Classes/Aluno.php";
session_start();

try {
    
    $alunos = $_POST['aluno'];

    $_SESSION['aluno'] = $alunos;

    header('Location: inserirTurma.php');
} catch (Exception $e) {
    echo $e->getMessage();
}

?>
