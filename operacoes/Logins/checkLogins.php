<?php

error_reporting(0);
ini_set('display_errors', 0);

session_start();

$matricula = $_SESSION['matricula'];
$logado = $_SESSION['logado'];

if (isset($logado) && $logado === true) {
    $response = array(
        "authenticated" => true,
        "matricula" => $matricula
    );
} else {
    $response = array(
        "authenticated" => false
    );
}

header('Content-Type: application/json');
echo json_encode($response);
?>
