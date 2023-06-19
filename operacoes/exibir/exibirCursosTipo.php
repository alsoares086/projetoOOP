<?php
require_once "../../mapper/CursoMapper.php";
require_once "../../modelos/Curso.php";

$username = "root";
$password = "";

try {
    $conn = new PDO('mysql:host=localhost;dbname=dbacademico', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    CursoMapper::setConnection($conn);

    $conteudo = trim(file_get_contents("php://input"));
    $data = json_decode($conteudo, true);

    $response = array(); // Inicializa a resposta como um array vazio

    if (isset($data['tipo'])) {
        $tipo = $data['tipo'];
        
        $cursos = CursoMapper::findCursoTipo($tipo);
        
        $response['success'] = !empty($cursos);
        $response['message'] = $response['success'] ? 'Cursos encontrados' : 'Nenhum curso encontrado para o tipo de curso especificado';
        $response['cursos'] = $cursos;
    } else {
        $response['success'] = false;
        $response['message'] = 'Tipo de curso não especificado';
    }
} catch (PDOException $e) {
    $response['success'] = false;
    $response['error'] = 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
}

header('Content-Type: application/json');
echo json_encode($response);
?>
