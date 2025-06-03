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

<section class="hero">
    <div class="box-txt">
        <h2>Pedido</h2>

        <form action="processa_pedido.php" method="post">
            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Disponível</th>
                        <th>Quantidade Pedida</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // Conexão com o banco
                $conn = new mysqli('localhost', 'root', '', 'cadastro');
                if ($conn->connect_error) {
                    die("Erro: " . $conn->connect_error);
                }

                // Buscar produtos do estoque
                $sql = "SELECT * FROM produtos";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row['produto']) . '</td>';
                        echo '<td>' . (int)$row['quantidade'] . '</td>';
                        echo '<td><input type="number" name="pedido[' . $row['id'] . ']" min="0" max="' . (int)$row['quantidade'] . '"></td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="3">Nenhum item disponível no estoque.</td></tr>';
                }

                $conn->close();
                ?>
                </tbody>
            </table>
            <p>  <input type="submit" value="Confirmar Pedido" class="btn-hero"> </p>
            
        </form>

        <a href="atendimento.php" class="btn-voltar">Voltar</a>      
    </div>
</section>

<footer>
    <p>2025 © Hamburgueria Temática Burgueir Mágico. Todos os direitos reservados.</p>
</footer>

</body>
</html>