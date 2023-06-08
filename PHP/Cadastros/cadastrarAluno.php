<?php
require_once "..\Classes\Mapper\AlunoMapper.php";
require_once "..\Classes\Aluno.php";

$username = "root";
$password = "";

    $nomeAluno = $_POST['nome'];
    $matriculaAluno = $_POST['matricula'];
    $senhaAluno = $_POST['senha'];

    try {
        $conn = new PDO ('mysql:host=localhost; dbname=dbacademico', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        AlunoMapper::setConnection($conn);

        $aluno = new Aluno();
        $aluno -> setNomeAluno($nomeAluno);
        $aluno -> setMatriculaAluno($matriculaAluno);
        $aluno -> setSenhaAluno($senhaAluno);
   
        AlunoMapper::save($aluno);

        echo"Aluno Cadastrado!";
       
    } catch (Exception $e) {
        print $e->getMessage();
    }

?>
