<?php

require_once "..\Classes\Mapper\AdministradorMapper.php";
require_once "..\Classes\Administrador.php";

$username = "root";
$password = "";

    $nome= $_POST['nome'];
    $senha= $_POST['senha'];
    $matricula= $_POST['matricula'];


    try {
        $conn = new PDO ('mysql:host=localhost; dbname=dbacademico', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        AdministradorMapper::setConnection($conn);    

        $adm = new Administrador();
        $adm -> setNome($nome);
        $adm -> setMatricula($matricula);
        $adm -> setSenha($senha);
       
        AdministradorMapper::save($adm);

    } catch (Exception $e) {
        print $e->getMessage();
    }

?>
