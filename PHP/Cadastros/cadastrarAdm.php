<?php

require_once "..\Classes\Gateway\AdministradorGateway.php";
require_once "..\Classes\Administrador.php";

$username = "root";
$password = "";

    $nome= $_POST['nome'];
    $senha= $_POST['senha'];
    $matricula= $_POST['matricula'];



    try {
        $conn = new PDO ('mysql:host=localhost; dbname=dbacademico', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        Administrador::setConnection($conn);    
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        AdministradorGateway::setConnection($conn);

        $adm = new Administrador();
        $adm -> nome = $nome;
        $adm -> matricula = $matricula;
        $adm -> senha = $senha;
        $adm -> save();

        $departamento = Administrador::all();
        foreach ($departamento as $admin) {
            echo "Nome: " . $admin->nome . "<br>";
            echo "matricula:  " . $admin->matricula . "<br>";
            echo "senha: " . $admin->senha . "<br><br>";
        }
    } catch (Exception $e) {
        print $e->getMessage();
    }

?>
