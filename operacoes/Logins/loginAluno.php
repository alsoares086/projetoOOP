<?php

require_once "../../mapper/AlunoMapper.php";
require_once "../../modelos/Aluno.php";


$matricula = $_POST['matricula'];
$senha = $_POST['password'];

$username = "root";
$password = "";


try {
    $conn = new PDO("mysql:host=localhost;dbname=dbacademico", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    AlunoMapper::setConnection($conn);

    if (AlunoMapper::autenticacao($matricula, $senha)) {

        echo "Login bem-sucedido!";

    } else {
        header('Location: ../../pages/loginAluno.html');
    }
} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}


?>