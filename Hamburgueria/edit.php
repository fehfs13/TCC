<?php
require_once 'config.php';

// Variáveis iniciais vazias
$id = '';
$produto = '';
$quantidade = '';
$custo = '';
$margem = '';

// Se clicou em salvar (POST), atualiza no banco
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $custo = $_POST['custo'];
    $margem = $_POST['margem'];

    // Atualiza os dados no banco
    $sqlUpdate = "UPDATE produtos SET produto=?, quantidade=?, custo=?, margem=? WHERE id=?";
    $stmt = $conn->prepare($sqlUpdate);
    $stmt->bind_param("sidii", $produto, $quantidade, $custo, $margem, $id);

    if ($stmt->execute()) {
        header('Location: cadastrado.php');
        exit(); // Depois de salvar, redireciona e para o código
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}

// Se recebeu um ID via GET, busca o insumo para preencher o formulário
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM produtos WHERE id=?";
    $stmt = $conn->prepare($sqlSelect);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        $produto = $user_data['produto'];
        $quantidade = $user_data['quantidade'];
        $custo = $user_data['custo'];
        $margem = $user_data['margem'];
    } else {
        echo "<p>Produto não encontrado.</p>";
        exit();
    }
} else {
    echo "<p>ID inválido.</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Insumo - Hamburgueria</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<header>
    <h1>Burgueir Mágico</h1>
</header>

<section class="hero">
    <div class="box-txt">
        <h2>Editar Insumo</h2>

        <form class="formulario" action="" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <p>Produto: <input type="text" name="produto" value="<?php echo htmlspecialchars($produto); ?>" required></p>
            <p>Quantidade: <input type="number" name="quantidade" value="<?php echo htmlspecialchars($quantidade); ?>" required></p>
            <p>Custo Unitário: <input type="number" step="0.01" name="custo" value="<?php echo htmlspecialchars($custo); ?>" required></p>
            <p>Margem (%): <input type="number" step="0.01" name="margem" value="<?php echo htmlspecialchars($margem); ?>" required></p>
            <p><input type="submit" value="Salvar" class="btn-hero"></p>
        </form>
    </div>
</section>

<footer>
    <p>2025 © Hamburgueria Temática Burgueir Mágico. Todos os direitos reservados.</p>
</footer>

</body>
</html>