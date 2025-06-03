<?php
session_start();

$usuarios = [
    'admin' => ['senha' => '1234', 'tipo' => 'geral'],
    'atendente' => ['senha' => '5678', 'tipo' => 'atendimento']
];

$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';
$tipo_solicitado = $_POST['tipo'] ?? '';

if (isset($usuarios[$usuario]) &&
    $usuarios[$usuario]['senha'] === $senha &&
    $usuarios[$usuario]['tipo'] === $tipo_solicitado
) {
    $_SESSION['usuario'] = $usuario;
    $_SESSION['tipo'] = $tipo_solicitado;

    if ($tipo_solicitado === 'geral') {
        header("Location: geral.php");
    } else {
        header("Location: atendimento.php");
    }
    exit;
} else {
    echo "<h3>Usuário ou senha inválidos ou tipo incorreto.</h3>";
    echo '<a href="login.php?tipo=' . urlencode($tipo_solicitado) . '">Tentar novamente</a>';
}
