<?php
// Informações de conexão com o banco de dados
$host = 'localhost';
$dbname = 'colletosports';
$user = 'root';
$password = '';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    // Verifica se uma imagem foi enviada
    if (isset($_FILES['imagem'])) {
        $imagem = $_FILES['imagem']['tmp_name'];

        // Converte a imagem em bytes
        $imagemBytes = file_get_contents($imagem);

        // Conecta ao banco de dados
        $dsn = "mysql:host=$host;dbname=$dbname";
        $pdo = new PDO($dsn, $user, $password);

        // Insere o produto no banco de dados
        $sql = "INSERT INTO produto (nome, descricao, preco, quant_estoque, imagem) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $descricao);
        $stmt->bindParam(3, $preco);
        $stmt->bindParam(4, $quantidade);
        $stmt->bindParam(5, $imagemBytes, PDO::PARAM_LOB);
        $stmt->execute();

        // Redireciona para a página de produtos
        header("Location: produtos.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inserir Produto</title>
    <style>
        body {
            background-color: #151E30;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0 auto;
            max-width: 600px;
            padding: 20px;

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
        input[type="number"],
        input[type="file"] {
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
    <h1>Colleto Sports - Inserir Produto</h1>
    <form method="POST" action="inserirproduto.php" enctype="multipart/form-data">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>
        
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" required></textarea><br>
        
        <label for="preco">Preço:</label>
        <input type="number" name="preco" step="0.01" required><br>
        
        <label for="quantidade">Quantidade Estoque:</label>
        <input type="number" name="quantidade" required><br>
        
        <label for="imagem">Imagem:</label>
        <input type="file" name="imagem" required><br>
        
        <input type="submit" value="Inserir Produto">
    </form>
</body>
</html>
