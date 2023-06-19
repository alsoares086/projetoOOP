<?php
session_start();

$matricula = $_SESSION['matricula'];
$logado = $_SESSION['logado'];
$senha = $_SESSION['senha'];

if (isset($logado) && $logado === true) {
    $matriculaJson = json_encode($matricula);
    header('Location: ../../pages/homeAdm.html?matricula=' . urlencode($matriculaJson));
} else {
    header('Location: ../../pages/loginAdm.html');
}
?>
