<?php
include("../conexion.php");
session_start();

if ($_SESSION && $_SESSION['CORREO'] !== null) {
    if ($_SESSION['ROL'] === 'administrador')
        header("location: ../feed-administradores/index.php");
    else if ($_SESSION['ROL'] === 'asesor')
        header("location: ../feed-asesores/index.php");
    else if ($_SESSION['ROL'] === 'alumno')
        header("location: ../feed-alumnos/index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $apellidos = mysqli_real_escape_string($conexion, $_POST['apellidos']);
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $password = md5(mysqli_real_escape_string($conexion, $_POST['password']));
    $semestre = mysqli_real_escape_string($conexion, $_POST['semestre']);

    $sql = "SELECT * FROM alumnos AS A WHERE A.CORREO = '$correo'";

    if ($result = $conexion->query($sql)) {
        if ($row = mysqli_fetch_array($result)) {
            echo '<script language="javascript">';
            echo 'alert("El alumno que intenta crear ya éxiste.")';
            echo '</script>';
        } else {

            $sql_insert = "INSERT INTO alumnos (NOMBRE, APELLIDOS, CORREO, PASSWORD, SEMESTRE) VALUES ('$nombre', '$apellidos', '$correo', '$password', '$semestre')";

            if (mysqli_query($conexion, $sql_insert)) {
                $sql = "SELECT * FROM alumnos AS A INNER JOIN semestres AS S ON A.SEMESTRE = S.ID_SEMESTRES WHERE A.CORREO = '$correo' and A.PASSWORD = '$password'";
                $result = mysqli_query($conexion, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $_SESSION['ID_ALUMNOS'] = $row['ID_ALUMNOS'];
                $_SESSION['NOMBRE'] = $row['NOMBRE'];
                $_SESSION['APELLIDOS'] = $row['APELLIDOS'];
                $_SESSION['CORREO'] = $row['CORREO'];
                $_SESSION['SEMESTRE_ID'] = $row['SEMESTRE'];
                $_SESSION['SEMESTRE_DESC'] = $row['VALOR'];
                $_SESSION['ROL'] = 'alumno';
                header("location: ../feed-alumnos/index.php");
            } else {
                echo '<script language="javascript">';
                echo 'alert("Error al crear alumno, intente con otro correo")';
                echo '</script>';
            }
        }
    }
}
?>
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
        <div class="div-container ">
            <form class="modal-content" action="" method="POST">
                <div class="imgcontainer">
                    <i class="fa fa-user avatar"></i>
                </div>

                <div class="input-container">
                    <select name="semestre" id="semestre" required>
                        <option value="" selected>Selecciona tu semestre</option>
                        <option value="1">1er y 2do Semestre</option>
                        <option value="2">3er y 4to Semestre</option>
                        <option value="3">5to y 6to Semestre</option>
                    </select>
                </div>

                <div class="container">
                    <div class="input-container">
                        <i class="fa fa-user icon"></i>
                        <input class="input-field" type="text" placeholder="Nombre(s)" name="nombre" required>
                    </div>

                    <div class="input-container">
                        <i class="fa fa-user icon"></i>
                        <input class="input-field" type="text" placeholder="Apellidos" name="apellidos" required>
                    </div>

                    <div class="input-container">
                        <i class="fa fa-envelope icon"></i>
                        <input class="input-field" type="correo" placeholder="Correo" name="correo" required>
                    </div>

                    <div class="input-container">
                        <i class="fa fa-key icon"></i>
                        <input id="password" name="password" class="input-field" type="password" placeholder="Contraseña" pattern="^\S{6,}$" oninput="checkPassword()" maxlength="10" required>
                    </div>

                    <div class="input-container">
                        <i class="fa fa-key icon"></i>
                        <input id="password-two" name="password-two" class="input-field" type="password" placeholder="Confirmar contraseña" pattern="^\S{6,}$" oninput="checkPassword()" maxlength="10" required>
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