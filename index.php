<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colleto Sport's</title>
    <link rel="icon" type="image/x-icon" href="Logopreta.svg" widht="30px">
    <link rel="stylesheet" href="CSS/inicial.css">
</head>
<body>
        <header>
            <div class="logo">
                <img  src="Logopreta.svg" alt="logo da loja" title="Logo da loja"
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
    </br></br></br></br></br></br></br></br></br>


        <div class="slider">
             <div class="slides">
                    <!--Radio Buttons-->
                    <input type="radio" name="radio-btn" id="radio1">
                    <input type="radio" name="radio-btn" id="radio2">
                    <input type="radio" name="radio-btn" id="radio3">
                    <input type="radio" name="radio-btn" id="radio4">
                     <!--FimRadio-->

                    <!--ImgSlide-->
                    <div class="slide first">
                        <a href="promo"><img src="Slider/1.png" alt="Slide Melhores Preços" title="Slide Melhores Preços"/></a>
                    </div>
                    <div class="slide">
                        <a href="promo"><img src="Slider/2.png" alt="Slide Melhores Marcas" title="Slide Melhores Marcas"/></a>
                    </div>
                    <div class="slide">
                        <a href="promo"><img src="Slider/3.png" alt="Slide Melhor Qualidade" title="Slide Melhor Qualidade"/></a>
                    </div>
                    <div class="slide">
                        <a href="promo"><img src="Slider/Sliders.png" alt="Frete Gratis" title="Frete Gratis"/></a>
                    </div>
                    <!--Fim ImgSlide-->

                    <!--Navigation Auto-->
                    <div class="navigation-auto">
                        <div class="auto-btn1"></div>
                        <div class="auto-btn2"></div>
                        <div class="auto-btn3"></div>
                        <div class="auto-btn4"></div>
                    </div>
                </div>

                <div class="manual-navigation">
                <label for="radio1" class="manual-btn"></label>
                <label for="radio2" class="manual-btn"></label>
                <label for="radio3" class="manual-btn"></label>
                <label for="radio4" class="manual-btn"></label>
                </div>
        
        </div><!--Carrossel-->

    </br>  </br> 

        <div class="texto">
            <p><b><h3>APROVEITE NOSSOS BENEFÍCIOS!</h3></b></p>
        </div><!--Texto Cards-->
    </br> 

    <section class="beneficios">
        <div class="benef1">
            <li><a href="frete.php"><img src="Imagens/imgfrete.png" alt="Sobre Frete" title="Sobre Frete" width="196" height="83" ></a></li>
        </div>
        <div class="benef2">
            <li><a href="troca.php"><img src="Imagens/imgtroca.png" alt="Sobre Troca" title="Sobre Troca" width="196" height="83" ></a></li>
        </div>
        <div class="benef3">
            <li><a href="parcelamento.php"><img src="Imagens/imgpagamento.png" alt="Sobre parcelamento" title="Sobre parcelamento" width="196" height="83" ></a></li>
        </div>
    </section><!--Promocoes-->

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
   <script src="slider.js"></script> 
</body>
</html>