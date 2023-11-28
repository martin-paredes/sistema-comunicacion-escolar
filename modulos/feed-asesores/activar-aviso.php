<?php
require_once("../conexion.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $activo = $_GET['activo'];
    $activo = $activo == 1 ? 0 : 1;
    $query = "UPDATE avisos SET ACTIVO = $activo WHERE ID_AVISOS =" . $id;
    $result = mysqli_query($conexion, $query);
}

header("location: index.php");

exit;
