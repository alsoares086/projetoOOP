<?php

require_once "../../mapper/ProfessorMapper.php";
require_once "../../modelos/Professor.php";

$username = "root";
$password = "";

    $nome = $_POST['nome'];
    $escolaridade = $_POST['escolaridade'];
    $especializacao = $_POST['especializacao'];
    $senha = $_POST['senha'];
    $matricula = $_POST['matricula'];

    try {
        $conn = new PDO ('mysql:host=localhost; dbname=dbacademico', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        ProfessorMapper::setConnection($conn);

        $professor = new Professor();
        $professor -> setNomeProfessor($nome);
        $professor -> setEscolaridade($escolaridade);
        $professor -> setEspecializacao($especializacao);
        $professor -> setSenhaProfessor($senha);
        $professor -> setMatriculaProfessor($matricula);

        ProfessorMapper::save($professor);
  
    } catch (Exception $e) {
        print $e->getMessage();
    }

?>
