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
    <div style="margin-bottom: 20px;">
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

    <script defer="defer" src="https://saas-widget-chat.s3.us-east-2.amazonaws.com/main.js?v=1709007075736" id="adiContainer" adiID="WImeT56ygwEPefB5hsoYeq6SCvSOVBhxjrHKiFrdmE0=" ></script>
    <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
    <div class="elfsight-app-29af874d-7ced-4b17-8914-2606d003b9de" data-elfsight-app-lazy></div>

</body>

</html>