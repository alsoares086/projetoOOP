<?php
session_start();

try {
    $_SESSION['cursos'] = array();

    $nome = $_POST['nome'];
    $cargaHoraria = $_POST['cargaHoraria'];
    $curso = $_POST['cursos'];

    if (is_array($curso)) {
        foreach ($curso as $cursosSelecionados) {
            $_SESSION['cursos'][] = $cursosSelecionados;
        }
    } else {
        // Tratar o caso em que $curso não é um array
    }

    $_SESSION['nome'] = $nome;
    $_SESSION['cargaHoraria'] = $cargaHoraria;

    header('Location: ../cadastros/cadastrarDisciplina.php');
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
