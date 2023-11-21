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
    <link rel="stylesheet" href="../../estilos/styles.css" />
    <link rel="stylesheet" href="../../estilos/feed.css" />
    <link rel="stylesheet" href="../../estilos/modal.css" />
    <link rel="stylesheet" href="../../estilos/login.css" />
</head>

<body>
    <ul>
        <li>
            <a class="active" onclick="ocultarMostrar(document.getElementById('alumnos'), 'none'); ocultarMostrar(document.getElementById('cargar-avisos'), 'block');">
                <i class="fa fa-fw fa-cloud-upload"></i> Cargar Avisos
            </a>
        </li>
        <li>
            <a onclick="ocultarMostrar(document.getElementById('cargar-avisos'), 'none'); ocultarMostrar(document.getElementById('alumnos'), 'block'); obtenerListadoAlumnos()">
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

                <label for="myfile">Selecciona tu aviso:</label>
                <input type="file" id="myfile" name="myfile" accept=".jpg, .jpeg, .png"><br><br>

                <button type="submit">
                    Subir Aviso
                </button>
            </div>
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
            <tr>
                <td>aviso_importante.png</td>
                <td>...</td>
                <td>20-Nov-2023</td>
                <td>21-Nov-2023</td>
                <td>
                    <input type="checkbox" name="name1" />&nbsp;
                </td>
                <td>
                    <button class="cancelbtn" onclick="eliminarAviso();">Eliminar</button>
                </td>
            </tr>
        </table>
    </div>

    <div id="alumnos" class="container" style="display: none;">
        <h2>Alumnos (<?php echo $_SESSION['SEMESTRE_DESC'] ?>)</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
            </tr>
            <tr>
                <td>Juan Pérez Cortés</td>
                <td>juan@gmail.com</td>
            </tr>
            <tr>
                <td>Pedro Sánchez García</td>
                <td>pedro@gmail.com</td>
            </tr>
            <tr>
                <td>Pablo Huerta Flores</td>
                <td>pablo@gmail.com</td>
            </tr>
        </table>
    </div>

    <script src="../../js/script.js"></script>
</body>

</html>