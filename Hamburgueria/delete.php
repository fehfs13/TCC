<?php
if (!empty($_GET['id'])) {
    include_once('config.php');

    $id = $_GET['id'];

    // Prepara a query para deletar
    $sqlDelete = "DELETE FROM produtos WHERE id = ?";
    $stmt = $conn->prepare($sqlDelete);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header('Location: cadastrado.php'); // Redireciona de volta ao estoque
        exit();
    } else {
        echo "Erro ao excluir o item: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "ID inválido.";
}
?>