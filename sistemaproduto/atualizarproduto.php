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

// Executa a query para obter o produto pelo ID
$sql = "SELECT * FROM produto WHERE id_prod = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$produto = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se o produto foi encontrado
if (!$produto) {
    header("Location: lerproduto.php");
    exit();
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $categoria = $_POST['categoria'];

    // Atualiza o produto no banco de dados
    $sql = "UPDATE produto SET nome = ?, descricao = ?, preco = ?, quant_estoque = ?, categoria = ? WHERE id_prod = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $descricao, $preco, $quantidade, $categoria, $id]);

    // Redireciona para a página de leitura de produtos
    header("Location: produtos.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Atualizar Produto</title>
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

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea,
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: none;
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
    <h1>Colleto Sports - Atualizar Produto</h1>
    <form method="POST" action="atualizarproduto.php?id=<?= $id ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?= $produto['nome'] ?>" required><br>
        
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" required><?= $produto['descricao'] ?></textarea><br>
        
        <label for="preco">Preço:</label>
        <input type="number" name="preco" step="0.01" value="<?= $produto['preco'] ?>" required><br>
        
        <label for="quantidade">Quantidade Estoque:</label>
        <input type="number" name="quantidade" value="<?= $produto['quant_estoque'] ?>" required><br>
        
        <label for="categoria">Categoria:</label>
        <input type="radio" name="categoria" value="M" <?php echo ($produto['categoria'] === 'M') ? 'checked' : ''; ?> required> Masculino
        <input type="radio" name="categoria" value="F" <?php echo ($produto['categoria'] === 'F') ? 'checked' : ''; ?> required> Feminino
        <input type="radio" name="categoria" value="E" <?php echo ($produto['categoria'] === 'E') ? 'checked' : ''; ?> required> Esportes<br>
        
        <input type="submit" value="Atualizar Produto">
    </form>
</body>
</html>
