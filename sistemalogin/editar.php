<?php
session_start();
//$seguranca = isset($_SESSION['ativa']) ? true : header("location: login.php");
require_once "conexao.php";

if (isset($_POST['atualizar'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data_nasc = $_POST['data_nasc'];

    // Atualizar o usuário no banco de dados
    $query = "UPDATE usuario SET nome='$nome', email='$email', data_nasc='$data_nasc' WHERE id='$id'";
    $resultado = mysqli_query($connect, $query);

    if ($resultado) {
        header("Location: ../users.php");
        exit();
    } else {
        echo "Erro ao atualizar o usuário.";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Buscar o usuário com o ID fornecido
    $query = "SELECT * FROM usuario WHERE id='$id'";
    $resultado = mysqli_query($connect, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $usuario = mysqli_fetch_assoc($resultado);
    } else {
        echo "Usuário não encontrado.";
        exit();
    }
} else {
    echo "ID do usuário não fornecido.";
    exit();
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
    <title>Editar Usuário</title>
</head>
<body>
    <?php //if ($seguranca) : ?>
        <div class="container">
            <h1>Editar Usuário</h1>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" name="nome" value="<?php echo $usuario['nome']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $usuario['email']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="data_nasc">Data de Nascimento:</label>
                    <input type="date" class="form-control" name="data_nasc" value="<?php echo $usuario['data_nasc']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary" name="atualizar">Atualizar</button>
            </form>
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
</body>
</html>
