<?php
session_start();
require_once("../funciones.php");
$resultAlumnos = getAlumnos();
$resultAvisos = getAvisos();

if ($_SESSION['CORREO'] === null) {
    header("location: ../../index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_REQUEST['delete'])) {
        $sql_update = "UPDATE avisos SET ACTIVO = 0, ESTATUS = 0 WHERE ID_AVISOS = " . $_REQUEST['delete'];
        if (mysqli_query($conexion, $sql_update)) {
            echo '<script language="javascript">';
            echo 'alert("Aviso eliminado correctamente")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Error al eliminar aviso")';
            echo '</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>***Avisos***</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../estilos/styles.css" />
    <link rel="stylesheet" href="../../estilos/feed.css" />
    <link rel="stylesheet" href="../../estilos/modal.css" />
    <link rel="stylesheet" href="../../estilos/login.css" />
</head>

<body>
    <ul>
        <li>
            <a class="active" onclick="ocultarMostrar(document.getElementById('alumnos'), 'none'); ocultarMostrar(document.getElementById('cargar-avisos'), 'block');">
                <i class=" fa fa-fw fa-cloud-upload"></i> Cargar Avisos
            </a>
        </li>
        <li>
            <a onclick="ocultarMostrar(document.getElementById('cargar-avisos'), 'none'); ocultarMostrar(document.getElementById('alumnos'), 'block');">
                <i class="fa fa-fw fa-graduation-cap"></i> Alumnos
            </a>
        </li>
        <li style="float: right">
            <a style="cursor: pointer" href="../logout.php"><i class="fa fa-fw fa-sign-out"></i>Salir</a>
        </li>
    </ul>

    <div id="modal-cargar-avisos" class="modal">
        <div class="modal-content">
            <span class="close" onclick="cerrarModal()">&times;</span>
            <h2>Formulario para Subir Avisos (<?php echo $_SESSION['SEMESTRE_DESC'] ?>)</h2>

            <form method="post" action="subir-aviso.php" enctype="multipart/form-data">
                <div class="container">
                    <h5>Descripción</h5>
                    <div class="input-container">
                        <i class="fa fa-pencil icon"></i>
                        <input class="input-field" type="descripcion" placeholder="Descripción" name="descripcion" maxlength="50" required>
                    </div>

                    <h5>Fecha Inicial</h5>
                    <div class="input-container">
                        <i class="fa fa-calendar icon"></i>
                        <input class="input-field" type="date" id="fechaInicial" placeholder="Fecha Inicial" name="fechaInicial" required>
                    </div>

                    <h5>Fecha Final</h5>
                    <div class="input-container">
                        <i class="fa fa-calendar icon"></i>
                        <input class="input-field" type="date" id="fechaFinal" placeholder="Fecha Final" name="fechaFinal" required>
                    </div>

                    <label for="fileToUpload">Selecciona tu aviso:</label>
                    <input type="file" id="fileToUpload" name="fileToUpload" accept=".jpg, .jpeg, .png" required><br><br>

                    <button type="submit">
                        Subir Aviso
                    </button>
                </div>
            </form>

        </div>
    </div>

    <div id="cargar-avisos" class="container">
        <h2>Avisos <a id="btn-modal-cargar-avisos" onclick="abrirModalCargarAvisos()" style="cursor: pointer"><i class="fa fa-fw fa-plus-circle"></i></a></h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Fecha Inicial</th>
                <th>Fecha Final</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
            <?php
            while ($rows = mysqli_fetch_assoc($resultAvisos)) {
            ?>
                <tr>
                    <td><?php echo $rows['RUTA']; ?></td>
                    <td><?php echo $rows['DESCRIPCION']; ?></td>
                    <td><?php echo $rows['FECHA_INICIO']; ?></td>
                    <td><?php echo $rows['FECHA_FIN']; ?></td>
                    <td>
                        <a class="custom-icon" href="./activar-aviso.php?id=<?php echo $rows['ID_AVISOS']; ?>&activo=<?php echo ($rows['ACTIVO']); ?>" onclick="return activarAviso(<?php echo $rows['FECHA_INICIO'] < date("Y-m-d") ?>);">
                            <i class="fa fa-fw <?php echo ($rows['ACTIVO'] == 1 ? 'fa-check-square-o' : 'fa-square-o'); ?> <?php echo ($rows['FECHA_INICIO'] < date("Y-m-d") ? "icon-actions-bloqueado" : "icon-actions"); ?>"></i>
                        </a>
                    </td>
                    <td>
                        <a class="custom-icon" href="./eliminar-aviso.php?id=<?php echo $rows['ID_AVISOS']; ?>" onclick="return eliminarAviso(<?php echo $rows['ID_AVISOS']; ?>);">
                            <i class="fa fa-fw fa-trash icon-actions"></i>
                        </a>
                        <!-- <i class="fa fa-fw fa-pencil-square-o icon-actions" onclick="abrirModalCargarAvisos()"></i> -->
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

    <div id="alumnos" class="container" style="display: none;">
        <h2>Alumnos (<?php echo $_SESSION['SEMESTRE_DESC'] ?>)</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
            </tr>
            <?php
            while ($rows = mysqli_fetch_assoc($resultAlumnos)) {
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

    <script src="../../js/script.js"></script>
</body>

</html>