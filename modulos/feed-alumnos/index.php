<?php
session_start();

if ($_SESSION['CORREO'] === null) {
    header("location: ../../index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>***Avisos***</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../estilos/feed.css" />
</head>

<body>
    <ul>
        <li>
            <a class="active" href="#avisos"><i class="fa fa-fw fa-newspaper-o"></i> Avisos </a>
        </li>
        <li>
            <a href="#asesor"><i class="fa fa-fw fa-user-o"></i> Asesor </a>
        </li>
        <li style="float: right">
            <a style="cursor: pointer" href="../logout.php"><i class="fa fa-fw fa-sign-out"></i>Salir</a>
        </li>
    </ul>

    <h2 style="text-align: center">Avisos</h2>

    <div class="container">
        <div class="mySlides">
            <div class="numbertext">1 / 6</div>
            <img src="https://www.w3schools.com/howto/img_woods_wide.jpg" style="width: 100%" />
        </div>

        <div class="mySlides">
            <div class="numbertext">2 / 6</div>
            <img src="https://www.w3schools.com/howto/img_5terre_wide.jpg" style="width: 100%" />
        </div>

        <div class="mySlides">
            <div class="numbertext">3 / 6</div>
            <img src="https://www.w3schools.com/howto/img_mountains_wide.jpg" style="width: 100%" />
        </div>

        <div class="mySlides">
            <div class="numbertext">4 / 6</div>
            <img src="https://www.w3schools.com/howto/img_lights_wide.jpg" style="width: 100%" />
        </div>

        <div class="mySlides">
            <div class="numbertext">5 / 6</div>
            <img src="https://www.w3schools.com/howto/img_nature_wide.jpg" style="width: 100%" />
        </div>

        <div class="mySlides">
            <div class="numbertext">6 / 6</div>
            <img src="https://www.w3schools.com/howto/img_snow_wide.jpg" style="width: 100%" />
        </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

        <div class="caption-container">
            <p id="caption"></p>
        </div>

        <div class="row">
            <div class="column">
                <img class="demo cursor" src="https://www.w3schools.com/howto/img_woods.jpg" style="width: 100%" onclick="currentSlide(1)" alt="Semana Santa" />
            </div>
            <div class="column">
                <img class="demo cursor" src="https://www.w3schools.com/howto/img_5terre.jpg" style="width: 100%" onclick="currentSlide(2)" alt="Fin de Ciclo" />
            </div>
            <div class="column">
                <img class="demo cursor" src="https://www.w3schools.com/howto/img_mountains.jpg" style="width: 100%" onclick="currentSlide(3)" alt="Inicio de Ciclo" />
            </div>
            <div class="column">
                <img class="demo cursor" src="https://www.w3schools.com/howto/img_lights.jpg" style="width: 100%" onclick="currentSlide(4)" alt="Día de Muertos" />
            </div>
            <div class="column">
                <img class="demo cursor" src="https://www.w3schools.com/howto/img_nature.jpg" style="width: 100%" onclick="currentSlide(5)" alt="Navidad" />
            </div>
            <div class="column">
                <img class="demo cursor" src="https://www.w3schools.com/howto/img_snow.jpg" style="width: 100%" onclick="currentSlide(6)" alt="Inscripciones" />
            </div>
        </div>
    </div>

    <script src="../../js/script.js"></script>
</body>

</html>