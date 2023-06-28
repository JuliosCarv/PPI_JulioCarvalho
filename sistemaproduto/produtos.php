<?php
session_start();
require_once __DIR__ . "/../sistemalogin/conexao.php";

if (isset($_GET['action']) && $_GET['action'] == 'update') {
    // Lógica de atualização do produto
    if (isset($_POST['nome']) && isset($_POST['descricao']) && isset($_POST['preco']) && isset($_POST['quant_estoque'])) {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $quant_estoque = $_POST['quant_estoque'];

        // Atualizar o produto no banco de dados
        $query = "UPDATE produto SET nome='$nome', descricao='$descricao', preco='$preco', quant_estoque='$quant_estoque' WHERE id_prod='$id'";
        mysqli_query($connect, $query);
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    // Lógica de exclusão do produto
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Excluir o produto do banco de dados
        $query = "DELETE FROM produto WHERE id_prod='$id'";
        mysqli_query($connect, $query);
    }
}

$tabela = "produto";
$order = "nome";
$produtos = buscar($connect, $tabela, 1, $order);
//else {
//header("location: login.php");
//exit();
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
    <title>Gerenciador de Produtos</title>
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
                                <a class="nav-link" href="#">
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
                        <h1 class="h2">Produtos</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="btn-group mr-2">
                                    <a href="inserirproduto.php" class="btn btn-sm btn-outline-secondary">Inserir Produtos</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Preço</th>
                                    <th>Quantidade em Estoque</th>
                                    <th>Imagem</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($produtos as $produto) : ?>
                                    <tr>
                                        <td><?php echo $produto['id_prod']; ?></td>
                                        <td><?php echo $produto['nome']; ?></td>
                                        <td><?php echo $produto['descricao']; ?></td>
                                        <td><?php echo $produto['preco']; ?></td>
                                        <td><?php echo $produto['quant_estoque']; ?></td>
                                        <td><img src="data:image/jpeg;base64,<?= base64_encode($produto['imagem']) ?>" alt="Imagem do Produto" width="150" height="150"></td>
                                        <td>
                                            <a href="atualizarproduto.php?id=<?php echo $produto['id_prod']; ?>">Editar</a>
                                            <a href="excluirproduto.php?id=<?php echo $produto['id_prod']; ?>" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</a>
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
