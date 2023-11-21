<?php
session_start();

if ($_SESSION['CORREO'] === null) {
    header("location: ../../index.php");
}

if (isset($_GET['form'])) {

    switch ($_POST['form']) {
        case "A":
            echo "submitted A";
            break;

        case "B":
            echo "submitted B";
            break;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>***Avisos***</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../estilos/styles.css" />
    <link rel="stylesheet" href="../../estilos/feed.css" />
</head>

<body>
    <ul>
        <li>
            <a class="active" onclick="ocultarMostrar(document.getElementById('asesor'), 'none'); ocultarMostrar(document.getElementById('avisos'), 'block');">
                <i class="fa fa-fw fa-newspaper-o"></i> Avisos
            </a>
        </li>
        <li>
            <a onclick="ocultarMostrar(document.getElementById('avisos'), 'none'); ocultarMostrar(document.getElementById('asesor'), 'block')">
                <i class="fa fa-fw fa-user-o"></i> Asesor
            </a>
        </li>
        <li style="float: right">
            <a style="cursor: pointer" href="../logout.php"><i class="fa fa-fw fa-sign-out"></i>Salir</a>
        </li>
    </ul>

    <div id="asesor" class="container" style="display: none;">
        <h2>Datos Asesor</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Semestre</th>
            </tr>
            <tr>
                <td>Tomás Calderón García</td>
                <td>tomas@gmail.com</td>
                <td>1</td>
            </tr>
        </table>
    </div>

    <div id="avisos" class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
            </ol>

            <div class="carousel-inner">
                <div class="item active">
                    <img src="../../avisos/semestres_1_2/aviso_1.jpg" alt="aviso_1" style="width:100%;">
                </div>

                <div class="item">
                    <img src="../../avisos/semestres_1_2/aviso_2.jpg" alt="aviso_2" style="width:100%;">
                </div>

                <div class="item">
                    <img src="../../avisos/semestres_1_2/aviso_3.jpg" alt="aviso_3" style="width:100%;">
                </div>

                <div class="item">
                    <img src="../../avisos/semestres_1_2/aviso_4.jpg" alt="aviso_4" style="width:100%;">
                </div>

                <div class="item">
                    <img src="../../avisos/semestres_1_2/aviso_5.jpg" alt="aviso_5" style="width:100%;">
                </div>
            </div>

            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <script src="../../js/script.js"></script>
</body>

</html>