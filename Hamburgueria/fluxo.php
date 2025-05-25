<?php

include_once('config.php');

$sql = "SELECT * FROM produtos ORDER BY id DESC";
$result = $conn->query($sql);

// AQUI CALCULA AS SOMAS
$sql_soma = "SELECT 
                SUM(custo_total) AS soma_custo_total,
                SUM(previsao_venda) AS soma_previsao_venda,
                SUM(lucro_total) AS soma_lucro_total
            FROM produtos";
$result_soma = $conn->query($sql_soma);
$row_soma = $result_soma->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamburgueria</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<header>
    <h1>Burgueir Mágico</h1>
</header>
    <div class="hero">
        <h2>Fluxo Caixa</h2>
    </div>
    <div class="hero">

        <table>
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Quantidade(un)</th>
                    <th scope="col">Custo(R$)</th>
                    <th scope="col">Custo Total(R$)</th>
                    <th scope="col">Unitário Venda(R$)</th>
                    <th scope="col">Total Venda(R$)</th>
                    <th scope="col">Lucro(R$)</th>
                </tr>
            </thead>
            <tbody>

            <?php
            while($user_data = mysqli_fetch_assoc($result))
            {
                echo "<tr>";
                echo "<td>".$user_data['id']."</td>";
                echo "<td>".$user_data['produto']."</td>";
                echo "<td>".$user_data['quantidade']."</td>";
                echo "<td>".$user_data['custo']."</td>";
                echo "<td>".$user_data['custo_total']."</td>";
                echo "<td>".$user_data['unitario_venda']."</td>";
                echo "<td>".$user_data['previsao_venda']."</td>";
                echo "<td>".$user_data['lucro_total']."</td>";
                echo "</tr>";
            }
            ?>

            </tbody>
        </table>

    </div>

    <div class="hero">
            <p><strong>Soma do Custo Total: R$ <?php echo number_format($row_soma['soma_custo_total'], 2, ',', '.'); ?></strong></p>
            
            
        </div>

        <div class="hero">
        <p><strong>Soma da Previsão de Venda: R$ <?php echo number_format($row_soma['soma_previsao_venda'], 2, ',', '.'); ?></strong></p>
        </div>
        
        <div class="hero">
        <p><strong>Soma do Lucro Total: R$ <?php echo number_format($row_soma['soma_lucro_total'], 2, ',', '.'); ?></strong></p>
        </div>

    <div class="hero">
        <p></p>
        <a href="geral.php" class="btn-voltar">Voltar</a>
    </div>

<footer>
    <p>2025 © Hamburgueria Temárica Burgueir Mágico. Todos os direitos reservados.</p>
</footer>

</body>
</html>