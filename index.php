<?php
session_start();

if ($_SESSION && $_SESSION['CORREO'] !== null) {
    if ($_SESSION['ROL'] === 'administrador')
        header("location: ./modulos/feed-administradores/index.php");
    else if ($_SESSION['ROL'] === 'asesor')
        header("location: ./modulos/feed-asesores/index.php");
    else if ($_SESSION['ROL'] === 'alumno')
        header("location: ./modulos/feed-alumnos/index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ingresar</title>
    <link rel="stylesheet" href="./estilos/styles.css" />
    <link rel="stylesheet" href="./estilos/home.css" />
</head>

<body>
    <div>
        <div style="padding: 20px; text-align: center;">
            <img src="./assets/logo_cecyte.jpg" alt="Logo" class="logo-cecyte-home" />
        </div>

        <div class="container-button-home">
            <button type="button" class="cancelbtn2" onclick="window.location.href='./modulos/login/index.php';">
                Ingresar
            </button>
            <button type="button" class="cancelbtn2" onclick="window.location.href='./modulos/registro/index.php';">
                Registrarme
            </button>
        </div>
    </div>
</body>

</html>