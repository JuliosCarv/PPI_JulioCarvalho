<?php
$pdo = new PDO('mysql:host=localhost;dbname=ppi20.06', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Inserção
if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['telefone']) && isset($_POST['data_nascimento']) && isset($_POST['sexo'])){
    $sql = $pdo->prepare("INSERT INTO usuario (nome, email, senha, telefone, data_nasc, sexo) VALUES (?, ?, ?, ?, ?, ?)");
    if($sql->execute(array($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['telefone'], $_POST['data_nascimento'], $_POST['sexo']))){
        header("Location: login.php");
        exit();
    } else {
        $mensagem = "Dados não inseridos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro | Colleto Sport's</title>
    <link rel="icon" type="image/x-icon" href="Logopreta.svg" width="30px">
    <link rel="stylesheet" href="CSS/cadastro.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="Logopreta.svg" alt="logo da loja" title="Logo da loja" width="120px" height="120px">
        </div> <!--logo-->
        <div class="menu">
            <ul id="menuint">
                <li><a href="index.php">Início</a></li>
                <li>
                    <a href="#">Categorias</a>
                    <div class="dpdown">
                        <a href="masculina.php"><div class="submenu">Moda Masculina</div></a>
                        <a href="feminina.php"><div class="submenu">Moda Feminina</div></a>
                        <a href="esportes.php"><div class="submenu">Esportes</div></a>
                    </div>
                </li>
                <li><a href="atendimento.php">Atendimento</a></li>
                <li><a href="login.php"><img src="iconpeople.svg" alt="iconpeople" width="20px" height="20px"></a></li>
            </ul>
        </div><!--CabeçalhoMenu-->
    </header><!--Cabeçalho-->

    <div class="box"><!--Formulário-->
        <form action="" method="post">
            <fieldset>
                <legend><b>Cadastro</b></legend>
                <br>
                <div class="inputbox">
                    <input type="text" name="nome" inputmode="nome" class="inputuser" title="Ex: João da Silva" alt="nome" required>
                    <label for="nome" class="labelinput">Nome Completo</label>
                </div>
                <br><br>
                <div class="inputbox">
                    <input type="email" name="email" inputmode="email" class="inputuser" title="Ex: usuario@gmail.com" alt="email" required>
                    <label for="email" class="labelinput">E-mail</label>
                </div>
                <br><br>
                <div class="inputbox">
                    <input type="tel" name="telefone" inputmode="telefone" class="inputuser" title="Ex: +55 55 99999-9999" alt="telefone" required>
                    <label for="telefone" class="labelinput">Telefone</label>
                </div>
                <br><br>
                <div class="inputbox">
                    <input type="password" name="senha" class="inputuser" title="Ex: usuario1234" alt="senha" required>
                    <label for="senha" class="labelinput">Senha</label>
                </div>
                <br><br>
                <p>Sexo</p>
                <input type="radio" id="feminino" name="sexo" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="sexo" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="sexo" value="outro" required>
                <label for="outro">Outro</label>
                <br><br>
                <label for="data_nascimento"><b>Data de Nascimento</b></label>
                <input type="date" name="data_nascimento" inputmode="data_nascimento" required>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
        <?php if(isset($mensagem)): ?>
            <p><?php echo $mensagem; ?></p>
        <?php endif; ?>
    </div>

    <div class="Rodape">
        <div class="Mensagem">
            <h3>Colleto Sport's</h3>
            <a href="https://web.whatsapp.com">Nos envie uma mensagem!</a>
        </div>

        <div class="Explorar">
            <h3>Explore</h3>
            <p><a href="index.php">Início</a></p>
            <p><a href="atendimento.php">Atendimento</a></p>
            <p><a href="sistemalogin/cadastro.php">Cadastre-se para receber novidades por e-mail!</a></p>
        </div>
    </div><!--Rodapé-->
</body>
</html>
