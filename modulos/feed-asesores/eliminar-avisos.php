<?php
require_once("../conexion.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "UPDATE avisos SET ACTIVO = 0, ESTATUS = 0 WHERE ID_AVISOS =" . $id;
    $result = mysqli_query($conexion, $query);
}

header("location: index.php");

exit;
