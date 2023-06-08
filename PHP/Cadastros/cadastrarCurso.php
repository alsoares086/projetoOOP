<?php

require_once "../Classes/Mapper/CursoMapper.php";
require_once "../Classes/Curso.php";

$username = "root";
$password = "";

    $nomeCurso = $_POST['nome'];
    $cargaHoraria = $_POST['cargaHoraria'];
    $tipo = $_POST['tipo'];
    $turno = $_POST['turno'];

    try {
        $conn = new PDO('mysql:host=localhost;dbname=dbacademico', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        CursoMapper::setConnection($conn);

        $curso = new Curso();
        $curso->setNomeCurso($nomeCurso);
        $curso->setCargaHoraria($cargaHoraria);
        $curso->setTipoCurso($tipo);
        $curso->setTurnoCurso($turno);

        CursoMapper::save($curso);

        echo "Curso inserido no Banco!";    
        
    } catch (Exception $e) {
        echo $e->getMessage();
    }

?>
