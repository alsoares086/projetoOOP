<?php
session_start();


    try{

        $codigo = $_POST['codigo'];
        $cursoSelecionado = $_POST['cursos'];

        $_SESSION['codigo'] = $codigo;
        $_SESSION['cursoSelecionado'] = $cursoSelecionado;

 
        header('Location: ../../pages/cadastroAlunosTurma.html');
    }catch(Exception $e){
        print $e->getMessage();
    }


?>
