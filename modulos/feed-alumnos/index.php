<?php
session_start();
require_once("../funciones.php");

$semestres = array("../../avisos/semestres_1_2", "../../avisos/semestres_3_4", "../../avisos/semestres_5_6");
for ($i = 0; $i < count($semestres); $i++) {
    if (!is_dir($semestres[$i])) {
        mkdir($semestres[$i], 0777, true);
    }
}

$resultAsesor = getAsesor();
$resultAvisos = getAvisosAlumnos();
$resultAvisos2 = getAvisosAlumnos();

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
    <link rel="stylesheet" href="../../estilos/carrusel.scss" />
</head>

<body>
    <ul>
        <li>
            <a class="active" onclick="ocultarMostrar(document.getElementById('asesor'), 'none'); ocultarMostrar(document.getElementById('avisos'), 'grid');">
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
        <h2>Datos Asesor (<?php echo $_SESSION['SEMESTRE_DESC'] ?>)</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
            </tr>
            <?php
            while ($rows = mysqli_fetch_assoc($resultAsesor)) {
            ?>
                <tr>
                    <td><?php echo $rows['NOMBRE']; ?> <?php echo $rows['APELLIDOS']; ?></td>
                    <td><?php echo $rows['CORREO']; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

    <div id="avisos" class="wrapper" id="avisos">
        <nav class="lil-nav">
            <?php
            while ($rowsThumbnail = mysqli_fetch_assoc($resultAvisos2)) {
            ?>
                <a href="#<?php echo $rowsThumbnail['RUTA']; ?>">
                    <img class="lil-nav__img" src="<?php echo $_SESSION['RUTA_CONTENEDOR'] . '/' . $rowsThumbnail['RUTA']; ?>" alt="<?php echo $rowsThumbnail['RUTA']; ?>" />
                </a>
            <?php
            }
            ?>
        </nav>

        <div class="gallery">
            <?php
            while ($rows = mysqli_fetch_assoc($resultAvisos)) {
            ?>
                <img class="gallery__img" id="<?php echo $rows['RUTA']; ?>" src="<?php echo $_SESSION['RUTA_CONTENEDOR'] . '/' . $rows['RUTA']; ?>" alt="<?php echo $rows['RUTA']; ?>" />
            <?php
            }
            ?>
        </div>
    </div>

    <script src="../../js/script.js"></script>
</body>

</html>