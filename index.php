<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ingresar</title>
    <link rel="stylesheet" href="./estilos/styles.css" />
    <link rel="stylesheet" href="./estilos/login.css" />
</head>

<body>
    <form class="modal-content">
        <div class="imgcontainer">
            <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="Avatar" class="avatar" />
        </div>

        <div class="container">
            <label for="uname"><b>Usuario</b></label>
            <input type="text" placeholder="Ingresa tu usuario" name="uname" required />

            <label for="psw"><b>Contraseña</b></label>
            <input type="password" placeholder="Ingresa tu contraseña" name="psw" required />

            <button type="button" onclick="window.location.href='feed.html';">
                Ingresar
            </button>
            <label>
                <input type="checkbox" checked="checked" name="remember" /> Recordarme
            </label>
        </div>

        <div class="container">
            <button type="button" class="cancelbtn" onclick="window.location.href='registro.html';">
                Registrarme, no tengo cuenta
            </button>
        </div>
    </form>
</body>

</html>