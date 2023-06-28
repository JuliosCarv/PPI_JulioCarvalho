<?php
// Informações de conexão com o banco de dados
$host = 'localhost';
$dbname = 'colletosports';
$user = 'root';
$password = '';

// Verifica se o ID do produto foi fornecido
if (!isset($_GET['id'])) {
    header("Location: lerproduto.php");
    exit();
}

$id = $_GET['id'];

// Conecta ao banco de dados
$dsn = "mysql:host=$host;dbname=$dbname";
$pdo = new PDO($dsn, $user, $password);

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Exclui o produto do banco de dados
    $sql = "DELETE FROM produto WHERE id_prod = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    // Redireciona para a página de produtos
    header("Location: produtos.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Excluir Produto</title>
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

        p {
            margin-top: 20px;
        }

        input[type="submit"] {
            background-color: #8F773F;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Colleto Sports - Excluir Produto</h1>
    <p>Você tem certeza que deseja excluir este produto?</p>
    <form method="POST" action="excluirproduto.php?id=<?= $id ?>">
        <input type="submit" value="Excluir Produto">
    </form>
</body>
</html>
