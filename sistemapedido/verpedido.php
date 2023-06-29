<?php
// Conexão com o banco de dados
$host = 'localhost';
$dbname = 'colletosports';
$user = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta os pedidos na tabela "pedido"
    $stmt = $conn->query("SELECT * FROM pedido");
    $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ver Pedidos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Ver Pedidos</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Pedido</th>
                    <th>Quantidade de Produtos</th>
                    <th>ID da Compra</th>
                    <th>ID do Produto</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pedidos as $pedido): ?>
                <tr>
                    <td><?php echo $pedido['id_pedido']; ?></td>
                    <td><?php echo $pedido['quant_prod']; ?></td>
                    <td><?php echo $pedido['id_compra']; ?></td>
                    <td><?php echo $pedido['id_prod']; ?></td>
                    <td>
                        <a href="atualizarpedido.php?id=<?php echo $pedido['id_pedido']; ?>" class="btn btn-primary">Atualizar</a>
                        <a href="cancelarpedido.php?id=<?php echo $pedido['id_pedido']; ?>" class="btn btn-danger">Cancelar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
