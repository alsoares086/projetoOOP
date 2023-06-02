<?php

require_once "..\Classes\Gateway\ProfessorGateway.php";
require_once "..\Classes\Professor.php";

$username = "root";
$password = "";

    $nomeProfessor = $_POST['nome'];
    $escolaridade = $_POST['escolaridade'];
    $especializacao = $_POST['especializacao'];
    $senhaProfessor = $_POST['senha'];
    $usuarioProfessor = $_POST['usuario'];

    try {
        $conn = new PDO ('mysql:host=localhost; dbname=dbacademico', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        Professor::setConnection($conn);    
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        ProfessorGateway::setConnection($conn);

        $professor1 = new Professor();
        $professor1 -> nomeProfessor = $nomeProfessor;
        $professor1 -> escolaridade = $escolaridade;
        $professor1 -> especializacao = $especializacao;
        $professor1 -> senhaProfessor = $senhaProfessor;
        $professor1 -> usuarioProfessor = $usuarioProfessor;
        $professor1 -> save();

        $corpoDocente = Professor::all();
        foreach ($corpoDocente as $professores) {
            echo "Nome do Professor: " . $professores->nomeProfessor . "<br>";
            echo "Escolaridade:  " . $professores->escolaridade . "<br>";
            echo "Especialização: " . $professores->especializacao . "<br><br>";
        }
    } catch (Exception $e) {
        print $e->getMessage();
    }

    //Testando Table Data Gateway - validando
    //Foi contruído e testado  o Table Data Gateway com funcionamento validado
    //Não é construído para ser utilizado diretamente pela aplicação
    //O papel é só realizar a trasferência de dados
    //Precisamos de um objeto de domínio, que além de transpostar os dados,
    //também oferece método de negócio, utilizado pela aplicação para realizar
    //processos de negócio
?>
