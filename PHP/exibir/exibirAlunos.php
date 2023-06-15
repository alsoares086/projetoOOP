<?php
require_once "../Classes/Mapper/AlunoMapper.php";
require_once "../Classes/Aluno.php";

$username = "root";
$password = "";

try {
    $conn = new PDO('mysql:host=localhost;dbname=dbacademico', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    AlunoMapper::setConnection($conn);

    $alunos = AlunoMapper::allAlunos();

    if (!empty($alunos)) {
        echo json_encode($alunos);
    } else {
        echo json_encode(array('message' => 'Nenhum aluno encontrado.'));
    }
} catch (PDOException $e) {
    $error = array('error' => 'Erro ao conectar ao banco de dados: ' . $e->getMessage());
    echo json_encode($error);
}
?>
