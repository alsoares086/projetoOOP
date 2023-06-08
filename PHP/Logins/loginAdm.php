<?php

require_once "..\Classes\Mapper\AdministradorMapper.php";
require_once "..\Classes\Professor.php";


$matricula = $_POST['matricula'];
$senha = $_POST['password'];

$username = "root";
$password = "";


try {
    $conn = new PDO("mysql:host=localhost;dbname=dbacademico", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    AdministradorMapper::setConnection($conn);
 

    if (AdministradorMapper::autenticacao($matricula, $senha)) {

        header('Location: ../../homeAdm.html');
    } else {

        header('Location: ../../loginAdm.html');
    }
} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}


?>