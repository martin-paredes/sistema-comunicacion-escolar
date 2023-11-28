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
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $password = md5(mysqli_real_escape_string($conexion, $_POST['password']));
    $tabla = "alumnos";
    switch ($_POST['roles']) {
        case 'alumno':
            $tabla = "alumnos";
            break;
        case 'asesor':
            $tabla = "asesores";
            break;
        case 'administrador':
            $tabla = "administradores";
            break;
    }

    $sql = "SELECT * FROM $tabla AS A INNER JOIN semestres AS S ON A.SEMESTRE = S.ID_SEMESTRES WHERE A.CORREO = '$correo' and A.PASSWORD = '$password'";

    if ($_POST['roles'] === 'administrador') {
        $sql = "SELECT * FROM $tabla AS A WHERE A.CORREO = '$correo' and A.PASSWORD = '$password'";
    }

    $result = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $_SESSION['ID_' . strtoupper($tabla)] = $row['ID_' . strtoupper($tabla)];
        $_SESSION['NOMBRE'] = $row['NOMBRE'];
        $_SESSION['APELLIDOS'] = $row['APELLIDOS'];
        $_SESSION['CORREO'] = $row['CORREO'];
        $_SESSION['SEMESTRE_ID'] = $row['SEMESTRE'];
        $_SESSION['SEMESTRE_DESC'] = $row['VALOR'];
        $_SESSION['ROL'] = $_POST['roles'];
        $_SESSION['RUTA_CONTENEDOR'] = $row['RUTA_CONTENEDOR'];
        header("location: ../feed-" . $tabla .  "/index.php");
    } else {
        echo '<script language="javascript">';
        echo 'alert("Correo o contraseña incorrectos")';
        echo '</script>';
    }
}
?>

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
    <div class="wrapper">
        <div class="div-container ">
            <form class="modal-content" action="" method="post">
                <div class="imgcontainer">
                    <i class="fa fa-user avatar"></i>
                </div>

                <div class="input-container">
                    <select name="roles" id="roles" required>
                        <option value="alumno" selected>Alumno</option>
                        <option value="asesor">Asesor</option>
                        <!-- <option value="administrador">Administrador</option> -->
                    </select>
                </div>

                <div class="container">
                    <div class="input-container">
                        <i class="fa fa-envelope icon"></i>
                        <input class="input-field" type="correo" placeholder="Correo" name="correo" required>
                    </div>

                    <div class="input-container">
                        <i class="fa fa-key icon"></i>
                        <input id="password" name="password" class="input-field" type="password" placeholder="Contraseña" pattern="^\S{6,}$" maxlength="10" required>
                    </div>

                    <span class="label">Mostrar contraseña</span><input type="checkbox" onclick="viewPassword()" style="cursor: pointer;">

                    <button type="submit">
                        Ingresar
                    </button>
                </div>

                <div class="container">
                    <button type="button" class="cancelbtn" onclick="window.location.href='../registro/index.php';">
                        Registrarme, no tengo cuenta (Solo alumnos)
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="../../js/script.js"></script>
</body>

</html>