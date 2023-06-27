<?php require_once "sistemalogin/conexao.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Colleto Sport's</title>
    <link rel="icon" type="image/x-icon" href="Logopreta.svg" widht="30px">
    <link rel="stylesheet" href="CSS/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>  
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/
    <link rel="preconnect" href="https://fonts.gstatic.com/" >
</head>
<body>
    <header>
        <div class="logo">
            <img src="Logopreta.svg" alt="logo da loja" title="Logo da loja"
            width="120px" height="120px">
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

</br></br></br></br></br></br></br></br></br></br></br></br></br></br>

    <div class="box">
        <form action="" method="post">
            <fieldset>
                <legend><b>Login</b></legend>
                </br>
                <div class="inputbox">
                    <input type="text" name="email" inputmode="email" class="inputuser" title="Ex: usuario@gmail.com" alt="email" required>
                    <label for="text" class="labelinput">E-mail</label>
                </div>
                </br></br>
                <div class="inputbox">
                    <input type="password" name="senha" class="inputuser" title="Ex: usuario1234" alt="senha" required>
                    <label for="senha" class="labelinput">Senha</label>
                </div>
                </br>
                    <input type="submit" name="entrar" value="Entrar" id="submit">
                </br>
                <p class="antc">Ainda não tem uma conta?</p><a class="cadastre" href="cadastro.php">Cadastre-se agora!</a>
            </fieldset>
        </form>
    </div>

        <!-- Mensagem Conexao -->
        <?php 
        if (isset($_POST['entrar'])){
            login($connect);
        }
        ?>
</br>

    <div class="Rodape">
        <div class="Mensagem">
            <h3>Colleto Sport's</h3>
            <a href="https://web.whatsapp.com">Nos envie uma mensagem!</a>
        </div>
        <div class="Explorar">
            <h3>Explore</h3>
            <p><a href="index.php">Início</a></p>
            <p><a href="atendimento.php">Atendimento</a></p>
            <p><a href="cadastro.php">Cadastre-se para receber novidades por e-mail!</a></p>
        </div>
    </div><!--Rodapé-->

</body>
</html>
