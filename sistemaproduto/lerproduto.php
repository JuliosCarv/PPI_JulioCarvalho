<?php
// Informações de conexão com o banco de dados
$host = 'localhost';
$dbname = 'colletosports';
$user = 'root';
$password = '';

// Conecta ao banco de dados
$dsn = "mysql:host=$host;dbname=$dbname";
$pdo = new PDO($dsn, $user, $password);

// Executa a query de leitura dos produtos
$sql = "SELECT * FROM produto";
$stmt = $pdo->query($sql);
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ler Produto</title>
    <style>
        body {
            background-color: #151E30;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0 auto;
            max-width: 600px;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #8F773F;
        }

        table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 8px;
            border: 1px solid #8F773F;
        }

        img {
            max-width: 100px;
        }
    </style>
</head>
<body>
    <h1>Colleto Sports - Ler Produto</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Quantidade Estoque</th>
            <th>Imagem</th>
        </tr>
        <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?= $produto['id_prod'] ?></td>
                <td><?= $produto['nome'] ?></td>
                <td><?= $produto['descricao'] ?></td>
                <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                <td><?= $produto['quant_estoque'] ?></td>
                <td><img src="data:image/jpeg;base64,<?= base64_encode($produto['imagem']) ?>" alt="Imagem do Produto"></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
