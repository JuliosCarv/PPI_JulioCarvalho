<?php
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário
    $id_pedido = $_POST['id_pedido'];
    $quant_prod = $_POST['quant_prod'];
    $id_compra = $_POST['id_compra'];
    $id_prod = $_POST['id_prod'];

    // Conexão com o banco de dados
    $host = 'localhost';
    $dbname = 'colletosports';
    $user = 'root';
    $password = '';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Atualiza o pedido na tabela "pedido"
        $stmt = $conn->prepare("UPDATE pedido SET quant_prod = :quant_prod, id_compra = :id_compra, id_prod = :id_prod WHERE id_pedido = :id_pedido");
        $stmt->bindParam(':quant_prod', $quant_prod);
        $stmt->bindParam(':id_compra', $id_compra);
        $stmt->bindParam(':id_prod', $id_prod);
        $stmt->bindParam(':id_pedido', $id_pedido);
        $stmt->execute();

        // Redireciona para a página de visualização de pedidos
        header("Location: pedidos.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

// Verifica se o parâmetro de ID do pedido foi fornecido
if (isset($_GET['id'])) {
    $id_pedido = $_GET['id'];

    // Conexão com o banco de dados
    $host = 'localhost';
    $dbname = 'colletosports';
    $user = 'root';
    $password = '';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta o pedido pelo ID na tabela "pedido"
        $stmt = $conn->prepare("SELECT * FROM pedido WHERE id_pedido = :id_pedido");
        $stmt->bindParam(':id_pedido', $id_pedido);
        $stmt->execute();
        $pedido = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica se o pedido foi encontrado
        if (!$pedido) {
            echo "Pedido não encontrado.";
            exit();
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    echo "ID do pedido não fornecido.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Atualizar Pedido</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #151E30;
            color: #FFFFFF;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        .container {
            width: 400px;
        }
        
        h2 {
            color: #FFFFFF;
            text-align: center;
            margin-bottom: 30px;
        }
        
        label {
            color: #FFFFFF;
        }
        
        .form-control {
            background-color: #8F773F;
            color: #FFFFFF;
        }
        
        .btn-primary {
            background-color: #8F773F;
            border-color: #8F773F;
            color: #FFFFFF;
        }
        
        .btn-primary:hover {
            background-color: #151E30;
            border-color: #151E30;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Atualizar Pedido</h2>
        <form method="POST" action="">
            <input type="hidden" name="id_pedido" value="<?php echo $pedido['id_pedido']; ?>">
            <div class="form-group">
                <label for="quant_prod">Quantidade de Produtos:</label>
                <input type="number" class="form-control" name="quant_prod" value="<?php echo $pedido['quant_prod']; ?>" required>
            </div>
            <div class="form-group">
                <label for="id_compra">ID da Compra:</label>
                <input type="number" class="form-control" name="id_compra" value="<?php echo $pedido['id_compra']; ?>" required>
            </div>
            <div class="form-group">
                <label for="id_prod">ID do Produto:</label>
                <input type="number" class="form-control" name="id_prod" value="<?php echo $pedido['id_prod']; ?>" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>
    </div>
</body>
</html>
