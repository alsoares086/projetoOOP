<?php

require_once "..\Classes\Gateway\CursoGateway.php";
require_once "..\Classes\Curso.php";

$username = "root";
$password = "";

    $nomeCurso = $_POST['nome'];
    $cargaHoraria = $_POST['cargaHoraria'];
    $tipo = $_POST['tipo'];

    try {
        $conn = new PDO ('mysql:host=localhost; dbname=dbacademico', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        Curso::setConnection($conn);    
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        CursoGateway::setConnection($conn);

        $curso = new Curso();
        $curso -> nomeCurso = $nomeCurso;
        $curso -> cargaHorariaCurso = $cargaHoraria;
        $curso -> tipoCurso = $tipo;
        $curso -> save();

        $Ementa = Curso::all();
        foreach ($Ementa as $Curso) {
            echo "Nome do Curso: " . $Curso->nomeCurso . "<br>";
            echo "Carga Horária:  " . $Curso->cargaHorariaCurso. "<br>";
            echo "Tipo: " . $Curso->tipoCurso . "<br>";
        }
    } catch (Exception $e) {
        print $e->getMessage();
    }

 ?>
