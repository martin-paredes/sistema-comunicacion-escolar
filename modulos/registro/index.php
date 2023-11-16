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
    <div class="wrapper">
        <div class="logincontainer ">
            <form class="modal-content" action="../feed/index.php">
                <div class="container">

                    <div class="input-container">
                        <i class="fa fa-envelope icon"></i>
                        <input class="input-field" type="email" placeholder="Correo" name="email" required>
                    </div>

                    <div class="input-container">
                        <i class="fa fa-key icon"></i>
                        <input id="pwd" name="pwd" class="input-field" type="password" placeholder="Contraseña" pattern="^\S{6,}$" oninput="checkPassword()" maxlength="8" required>
                    </div>

                    <div class="input-container">
                        <i class="fa fa-key icon"></i>
                        <input id="pwd-two" name="pwd-two" class="input-field" type="password" placeholder="Confirmar contraseña" pattern="^\S{6,}$" oninput="checkPassword()" maxlength="8" required>
                    </div>

                    <span class="label">Mostrar contraseña</span><input type="checkbox" onclick="viewPassword()" style="cursor: pointer;">

                    <button type="submit">Registrarme</button>
                </div>
                <div class="container">
                    <button type="button" class="cancelbtn" onclick="window.location.href='../login/index.php';">Ingresar, ya tengo
                        cuenta</button>
                </div>
            </form>
        </div>
    </div>
    <script src="../../js/script.js"></script>
</body>

</html>