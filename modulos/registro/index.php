<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../estilos/styles.css">
    <link rel="stylesheet" href="../../estilos/registro.css">
</head>

<body>

    <form class="modal-content">
        <div class="container">

            <div class="input-container">
                <i class="fa fa-user icon"></i>
                <input class="input-field" type="text" placeholder="Usuario" name="usrnm">
            </div>

            <div class="input-container">
                <i class="fa fa-envelope icon"></i>
                <input class="input-field" type="text" placeholder="Correo" name="email">
            </div>

            <div class="input-container">
                <i class="fa fa-key icon"></i>
                <input class="input-field" type="password" placeholder="Contraseña" name="psw">
            </div>

            <button type="button" onclick="window.location.href='../feed/index.php';">Registrarme</button>
        </div>

        <div class="container">
            <button type="button" class="cancelbtn" onclick="window.location.href='../login/index.php';">Ingresar, ya tengo
                cuenta</button>
        </div>
    </form>

</body>

</html>