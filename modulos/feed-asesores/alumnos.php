<?php
include("../conexion.php");
session_start();

if (!$conexion) {
    die('Could not connect: ' . mysqli_error($con));
}
$result = mysqli_query($conexion, "SELECT * FROM alumnos AS A WHERE A.SEMESTRE = " . $_SESSION['SEMESTRE_ID']);

$alumnos = mysqli_fetch_array($result, MYSQLI_ASSOC);

return $alumnos;

mysqli_close($conexion);
