<?php

require_once "../../mapper/ProfessorMapper.php";
require_once "../../modelos/Professor.php";


$matricula = $_POST['matricula'];
$senha = $_POST['password'];

$username = "root";
$password = "";


try {
    $conn = new PDO("mysql:host=localhost;dbname=dbacademico", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ProfessorMapper::setConnection($conn);
 

    if (ProfessorMapper::autenticacao($matricula, $senha)) {

        echo "Login bem-sucedido!";
    } else {

        header('Location: ../../pages/loginProfessor.html');
    }
} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}


?>