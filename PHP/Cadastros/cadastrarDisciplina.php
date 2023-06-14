<?php
session_start();
require_once "..\Classes\Mapper\DisciplinaMapper.php";
require_once "..\Classes\Mapper\CursoMapper.php";
require_once "..\Classes\Disciplina.php";
require_once "..\Classes\Curso.php";

$username = "root";
$password = "";

$nomeDisciplina = $_SESSION['nome'];
$cargaHoraria = $_SESSION['cargaHoraria'];
$cursosSelecionados = $_SESSION['cursos'];

try {
    $conn = new PDO('mysql:host=localhost;dbname=dbacademico', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    DisciplinaMapper::setConnection($conn);
    CursoMapper::setConnection($conn);

    $disciplina = new Disciplina();
    $disciplina->setNomeDisciplina($nomeDisciplina);
    $disciplina->setCargaHoraria($cargaHoraria);

    $cursos = array();

    foreach ($cursosSelecionados as $cursoSelecionado) {
        $curso = CursoMapper::findIdCurso($cursoSelecionado);

        if ($curso) {
            $cursos[] = $curso;
        } else {
            echo "Curso não encontrado para o ID: " . $cursoSelecionado;
        }
    }

    if (!empty($cursos)) {
        $disciplina->setCurso($cursos);
        DisciplinaMapper::save($disciplina);

        $disciplinaId = $disciplina->getIdDisciplina(); // Obter o ID da disciplina recém-inserida
        DisciplinaMapper::addCursoDisciplina($disciplina); // Passar o ID da disciplina para o método
    } else {
        echo "Curso não encontrado!";
    }

    echo "Disciplina inserida no Banco!";

} catch (Exception $e) {
    echo $e->getMessage();
}


 ?>
