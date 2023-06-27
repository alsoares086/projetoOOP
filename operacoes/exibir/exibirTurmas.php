<?php
require_once "../../mapper/TurmaMapper.php";
require_once "../../mapper/CursoMapper.php";
require_once "../../modelos/Turma.php";
require_once "../../modelos/Curso.php";

//error_reporting(0);
//ini_set('display_errors', 0);

$username = "root";
$password = "";

try {
    $conn = new PDO('mysql:host=localhost;dbname=dbacademico', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    TurmaMapper::setConnection($conn);
    CursoMapper::setConnection($conn);

    $cursos = CursoMapper::all();
    $turmas = TurmaMapper::all();
   
    $turmasData = [];
        foreach ($turmas as $turma) {
            $curso = CursoMapper::find($turma['curso']);

            $turmasData[] = [
                'codigo' => $turma['codigo'],
                'curso' => [
                    'id' => $curso->getId(),
                    'nome' => $curso->getNomeCurso(),
                    'turno' => $curso->getTurno(),
                    'tipo' => $curso->getTipoCurso()
                ]
            ];
        }
    header('Content-Type: application/json');
    echo json_encode($turmasData);
}catch(Exception $e){
    $error = array('error' => 'Erro ao conectar ao banco de dados: ' . $e->getMessage());
    echo json_encode($error);
}
?>