<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamburgueria - Estoque</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #f0c040;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbSenha = 'usbw';
$dbNome = 'cadastro';

$conn = new mysqli($dbHost, $dbUsername, $dbSenha, $dbNome);
if ($conn->connect_error) {
    die("Falha ao se comunicar com o banco de dados: " . $conn->connect_error);
}

echo '<h1>Estoque de Insumos</h1>';
echo '<table>';
echo '<thead>
        <tr>
            <th>ID</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Custo</th>
            <th>Margem</th>
        </tr>
      </thead>
      <tbody>';

$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    foreach ($result as $linha) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($linha['id']) . '</td>';
        echo '<td>' . htmlspecialchars($linha['produto']) . '</td>';
        echo '<td>' . htmlspecialchars($linha['quantidade']) . '</td>';
        echo '<td>R$ ' . number_format($linha['custo'], 2, ',', '.') . '</td>';
        echo '<td>' . $linha['margem'] . '%</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="5">Nenhum produto cadastrado.</td></tr>';
}

echo '</tbody></table>';
$conn->close();
?>
</body>
</html>