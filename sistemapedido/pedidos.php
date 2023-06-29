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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/cadastro.css">
    <title>Gerenciador de Pedidos</title>
</head>
<body>

<nav class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Colleto Sports</a>
    </nav>
        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="\PPI_ColletoSports_JulioCarvalhoERRO/dashboard.php">
                                    <span data-feather="home"></span>
                                    Dashboard<span class="sr-only">(atual)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../sistemaproduto/produtos.php">
                                    <span data-feather="shopping-cart"></span>
                                    Produtos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="\PPI_ColletoSports_JulioCarvalhoERRO/users.php">
                                    <span data-feather="users"></span>
                                    Usuários
                                </a>
                            </li>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pedidos.php">
                                    <span data-feather="file"></span>
                                    Pedidos
                                    </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">
                                    Sair
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Ver Pedidos</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="btn-group mr-2">
                                    <a href="inserirpedido.php" class="btn btn-sm btn-outline-secondary">Inserir</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
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
                </main>
            </div>
        </div>

        <!-- Principal JavaScript do Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="../../assets/js/vendor/popper.min.js"></script>
        <script src="../../dist/js/bootstrap.min.js"></script>

        <!-- Ícones -->
        <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
        <script>
            feather.replace()
        </script>

        <!-- Gráficos -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                    datasets: [{
                        data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
                        lineTension: 0,
                        backgroundColor: 'transparent',
                        borderColor: '#007bff',
                        borderWidth: 4,
                        pointBackgroundColor: '#007bff'
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: false
                            }
                        }]
                    },
                    legend: {
                        display: false,
                    }
                }
            });
        </script>
    <?php //} ?>
</body>
</html>
