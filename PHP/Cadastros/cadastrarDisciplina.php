<?php

require_once "..\Classes\Gateway\DisciplinaGateway.php";
require_once "..\Classes\Disciplina.php";

$username = "root";
$password = "";

    $nomeDisciplina = $_POST['nome'];
    $cargaHoraria = $_POST['cargaHoraria'];

    try {
        $conn = new PDO ('mysql:host=localhost; dbname=dbacademico', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        Disciplina::setConnection($conn);    
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        DisciplinaGateway::setConnection($conn);

        $disciplina = new Disciplina();
        $disciplina -> nomeDisciplina = $nomeDisciplina;
        $disciplina -> cargaHorariaDisciplina = $cargaHoraria;
        $disciplina -> save();

        $Grade = Disciplina::all();
        foreach ($Grade as $disciplinas) {
            echo "Disciplina: " . $disciplinas->nomeDisciplina . "<br>";
            echo "carga Horaria:  " . $disciplinas->cargaHorariaDisciplina. "<br>";
        }
    } catch (Exception $e) {
        print $e->getMessage();
    }

 ?>
