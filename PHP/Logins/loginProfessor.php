<?php

require_once "..\Classes\Gateway\professorGateway.php";
require_once "..\Classes\Professor.php";


$username = "root";
$password = "";

$usuario = $_POST['matricula'];
$senha = $_POST['password'];


try {
    $conn = new PDO("mysql:host=localhost;dbname=dbacademico", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    Professor::setConnection($conn);
    professorGateway::setConnection($conn);

    // Autenticação do aluno
    $professor = new Professor();
    $professor->idProfessor= $usuario;
    $professor->senhaProfessor = $senha;

    $authenticatedProfessor= $professor->autenticacao($usuario, $senha);

    if ($authenticatedProfessor) {
        // O aluno foi autenticado com sucesso
        echo "Login bem-sucedido!";
        // Realize as ações desejadas após o login

    } 
    else {
        // Credenciais inválidas
        // Redireciona para a página de login se a senha ou o usuário não der certo
        header('Location: ../../loginProfessor.html');

    }

} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}


?>