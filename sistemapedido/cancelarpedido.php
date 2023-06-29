<?php
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

        // Deleta o pedido pelo ID na tabela "pedido"
        $stmt = $conn->prepare("DELETE FROM pedido WHERE id_pedido = :id_pedido");
        $stmt->bindParam(':id_pedido', $id_pedido);
        $stmt->execute();

        // Redireciona para a página de visualização de pedidos
        header("Location: pedidos.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    echo "ID do pedido não fornecido.";
    exit();
}
?>
