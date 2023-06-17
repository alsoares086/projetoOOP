<?php
session_start();

try {
    
    $_SESSION['alunos'] = array();

    $alunosSelecionados = $_POST['alunos'];
    
    // itera sobre cada id selecionado
    foreach ($alunosSelecionados as $alunoId) {
        $_SESSION['alunos'][] = $alunoId;
    }


    //print_r ($_SESSION['alunos']);

    header('Location: ../inserirTurma.php');
} catch (Exception $e) {
    echo $e->getMessage();
}

?>
