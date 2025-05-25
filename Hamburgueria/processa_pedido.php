<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
    <link rel="stylesheet" href="estilo.css">

</head>
<body>
<header>
    <h1>Gestão Burgueir Mágico</h1>
</header>

<?php
// Conectar ao banco de dados
$dbHost = 'localhost';
$dbUsername = 'root';
$dbSenha = '';
$dbNome = 'cadastro';

$conn = new mysqli($dbHost, $dbUsername, $dbSenha, $dbNome);
if ($conn->connect_error) {
    die("Erro ao conectar: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if (isset($_POST['pedido']) && is_array($_POST['pedido'])) {
    $pedido = $_POST['pedido'];
    $erros = [];
    $itens_confirmados = [];
    $total_geral = 0;

    foreach ($pedido as $id => $qtd_pedida) {
        $id = (int)$id;
        $qtd_pedida = (int)$qtd_pedida;

        if ($qtd_pedida > 0) {
            // Buscar dados do produto
            $sql = "SELECT produto, quantidade, unitario_venda FROM produtos WHERE id = $id";
            $result = $conn->query($sql);

            if ($result && $row = $result->fetch_assoc()) {
                $estoque_atual = (int)$row['quantidade'];
                $produto = $row['produto'];
                $unitario_venda = (float)$row['unitario_venda'];

                if ($estoque_atual >= $qtd_pedida) {
                    // Atualiza estoque
                    $novo_estoque = $estoque_atual - $qtd_pedida;
                    $update_sql = "UPDATE produtos SET quantidade = $novo_estoque WHERE id = $id";
                    $conn->query($update_sql);

                    $total_item = $qtd_pedida * $unitario_venda;
                    $total_geral += $total_item;

                    // Salva para exibição
                    $itens_confirmados[] = [
                        'produto' => $produto,
                        'quantidade' => $qtd_pedida,
                        'valor' => $unitario_venda,
                        'total_item' => $total_item
                    ];
                } else {
                    $erros[] = "Estoque insuficiente para <strong>$produto</strong> (pedido: $qtd_pedida, disponível: $estoque_atual)";
                }
            } else {
                $erros[] = "Produto com ID $id não encontrado.";
            }
        }
    }

    // HTML de retorno
    echo '<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Resumo do Pedido</title>

    </head>
    <body>';

    if (!empty($itens_confirmados)) {
        
        echo '<section class="hero">';
        echo '<div class="box-txt">';
        echo '<h2>Resumo do Pedido</h2>';
        echo '</div>';
        echo '</section>';
       
        echo '<section class="hero">';
        echo '<table>
                <thead>
                    <tr>
                        <th>Descrição do Produto</th>
                        <th>Quantidade</th>
                        <th>Valor Unitário (R$)</th>
                        <th>Total do Item (R$)</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($itens_confirmados as $item) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($item['produto']) . '</td>';
            echo '<td>' . $item['quantidade'] . '</td>';
            echo '<td>' . number_format($item['valor'], 2, ',', '.') . '</td>';
            echo '<td>' . number_format($item['total_item'], 2, ',', '.') . '</td>';
            echo '</tr>';
        }

        echo '</tbody>
              <tfoot>
                  <tr>
                      <td colspan="3">Total Geral</td>
                      <td>' . number_format($total_geral, 2, ',', '.') . '</td>
                  </tr>
              </tfoot>
              </table>';
              echo '</section>';
    }
                echo '<section class="hero">';
    if (!empty($erros)) {
        echo '<h3>Ocorreram alguns problemas:</h3><ul>';
        foreach ($erros as $erro) {
            echo '<li>' . $erro . '</li>';
        }
        echo '</ul>';
    }

    echo '<a class="btn-voltar" href="mesa1.php">Voltar</a>
    </body>
    </html>';
} else {
    echo "<h2>Nenhum pedido foi recebido.</h2>";
    echo '<br><a href="atendimento.php">Voltar</a>';
}
    echo '</section>';
$conn->close();
?>

<footer>
    <p>2025 © Hamburgueria Temática Burgueir Mágico. Todos os direitos reservados.</p>
</footer>

</body>
</html>