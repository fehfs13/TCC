<?php

include_once('config.php');

$sql = "SELECT * FROM produtos ORDER BY id DESC";

$result = $conn->query($sql);

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

<section class="hero">
    <div class="box-txt">
      
        <h2>Estoque</h2>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Quantidade(un)</th>
                    <th scope="col">Custo(R$)</th>
                    <th scope="col">Margem(%)</th>
                    <th scope="col">Editar</th>
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
                echo "<td>".$user_data['margem']."</td>";
                echo "<td> 
                    <a class='btn btn-sm btn-primary' href='edit.php?id=".$user_data['id']."'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
                        </svg>
                    </a>  
                    
                    <a class='btn btn-sm btn-danger' href='delete.php?id=".$user_data['id']."' onclick=\"return confirm('Tem certeza que deseja excluir este item?');\" style='margin-left:5px;'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
                            <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
                        </svg>
                    </a>
                    </td>";
                echo "</tr>";
            }
            ?>

            </tbody>
 
        </table>

        <p></p>
        
        <a href="geral.php" class="btn-voltar">Voltar </a>    
    
    </div>
    
</section>

<footer>
    <p>2025 © Hamburgueria Temárica Burgueir Mágico. Todos os direitos reservados.</p>
</footer>

</body>
</html>