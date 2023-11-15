<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ingresar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../estilos/styles.css" />
    <link rel="stylesheet" href="../../estilos/login.css" />
</head>

<body>
    <form class="modal-content" action="../feed/index.php">
        <div class="imgcontainer">
            <i class="fa fa-user avatar"></i>
        </div>

        <div class="container">
            <div class="input-container">
                <i class="fa fa-envelope icon"></i>
                <input class="input-field" type="email" placeholder="Correo" name="email" required>
            </div>

            <div class="input-container">
                <i class="fa fa-key icon"></i>
                <input id="pwd" name="pwd" class="input-field" type="password" placeholder="Contraseña" pattern="^\S{6,}$" oninput="checkPassword()" maxlength="8" required>
            </div>

            <button type="submit">
                Ingresar
            </button>
        </div>

        <div class="container">
            <button type="button" class="cancelbtn" onclick="window.location.href='../registro/index.php';">
                Registrarme, no tengo cuenta
            </button>
        </div>
    </form>
</body>

</html>