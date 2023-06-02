<?php

require_once "..\Classes\Gateway\AlunoGateway.php";
require_once "..\Classes\Aluno.php";


$usuario = $_POST['matricula'];
$senha = $_POST['password'];

$username = "root";
$password = "";


try {
    $conn = new PDO("mysql:host=localhost;dbname=dbacademico", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    Aluno::setConnection($conn);
    AlunoGateway::setConnection($conn);

    // Autenticação do aluno
    $aluno = new Aluno();
    $aluno->idAluno = $usuario;
    $aluno->senhaAluno = $senha;

    $authenticatedAluno = $aluno->autenticar();

    if ($authenticatedAluno) {
        // O aluno foi autenticado com sucesso
        echo "Login bem-sucedido!";
        // Realize as ações desejadas após o login

    } else {
        // Credenciais inválidas
        echo "Usuário ou senha incorretos!";
        // Redirecione ou exiba uma mensagem de erro

    }

} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}


?>