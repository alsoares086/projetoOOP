<?php

require_once "..\Classes\Mapper\DisciplinaMapper.php";
require_once "..\Classes\Disciplina.php";

$username = "root";
$password = "";

    $nomeDisciplina = $_POST['nome'];
    $cargaHoraria = $_POST['cargaHoraria'];

    try {
        $conn = new PDO('mysql:host=localhost;dbname=dbacademico', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        DisciplinaMapper::setConnection($conn);

        $disciplina = new Disciplina();
        $disciplina->setNomeDisciplina($nomeDisciplina);
        $disciplina->setCargaHoraria($cargaHoraria);

        DisciplinaMapper::save($disciplina);

        echo "Disciplina inserida no Banco!";    
        
    } catch (Exception $e) {
        echo $e->getMessage();
    }

 ?>
