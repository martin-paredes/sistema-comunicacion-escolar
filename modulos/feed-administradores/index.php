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
            <a href="#asesores"><i class="fa fa-fw fa-graduation-cap"></i> Asesores </a>
        </li>
        <li style="float: right">
            <a style="cursor: pointer" href="../logout.php"><i class="fa fa-fw fa-sign-out"></i>Salir</a>
        </li>
    </ul>

    <h2 style="text-align: center">Avisos</h2>

    <div class="container"></div>

    <script src="../../js/script.js"></script>
</body>

</html>