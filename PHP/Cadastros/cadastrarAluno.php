<?php

require_once "Classes\Gateway\AlunoGateway.php";
require_once "Classes\Aluno.php";
require_once "Classes\Conexao.php";


    $nomeAluno = $_POST['nome'];
    $turno = $_POST['turno'];
    $curso = $_POST['curso'];
    $tipoCurso = $_POST['tipo'];
    $usuarioAluno = $_POST['usuario'];
    $senhaAluno = $_POST['senha'];

    try {
        $conn = new Conexao();
        $conn->setConnection();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        Aluno::setConnection($conn);    
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        AlunoGateway::setConnection($conn);

        $turma = Aluno::all();

        foreach($turma as $turma) { //foeach para excluir tudo do banco 
            $turma->delete(); //pegando cada dado da tabela e excluindo 
        }

        $aluno1 = new Aluno();
        $aluno1 -> nomeAluno = $nomeAluno;
        $aluno1 -> turno = $turno;
        $aluno1 -> curso = $curso;
        $aluno1 -> tipoCurso = $tipoCurso;
        $aluno1 -> usuarioAluno = $usuarioAluno;
        $aluno1 -> senhaAluno = $senhaAluno;
        $aluno1 -> save();

        $turma = Aluno::all();
        foreach ($turma as $sala) {
            echo "Nome do Aluno: " . $sala->nomeAluno . "<br>";
            echo "Curso:  " . $sala->curso . "<br>";
            echo "Tipo: " . $sala->tipoCurso . "<br>";
            echo "Turno: " . $sala->turno . "<br><br>";
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
