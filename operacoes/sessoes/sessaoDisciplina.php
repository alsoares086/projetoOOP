<?php

    session_start();

    try {
    $_SESSION['cursos'] = array();

    $nome = $_POST['nome'];
    $cargaHoraria = $_POST['cargaHoraria'];
    $curso = $_POST['cursos'];

    foreach ($curso as $cursosSelecionados) {
        $_SESSION['cursos'][] = $cursosSelecionados;
    }
    //print_r ($_SESSION['cursos']);

    $_SESSION['nome'] = $nome;
    $_SESSION['cargaHoraria'] = $cargaHoraria;

    
    header('Location: ../cadastros/cadastrarDisciplina.php');
    } catch (Exception $e) {
    echo $e->getMessage();
}

?>