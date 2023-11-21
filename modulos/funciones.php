<?php

require_once("../conexion.php");

function getAlumnos()
{
    global $conexion;
    $query = "SELECT * FROM alumnos AS A WHERE A.SEMESTRE = " . $_SESSION['SEMESTRE_ID'];
    $result = mysqli_query($conexion, $query);
    return $result;
}


function getAvisos()
{
    global $conexion;
    $query = "SELECT * FROM avisos AS AV WHERE AV.SEMESTRE = " . $_SESSION['SEMESTRE_ID'] . " AND AV.FECHA_INICIO >= CURDATE() AND AV.ESTATUS = 1";
    $result = mysqli_query($conexion, $query);
    return $result;
}


function eliminarAviso()
{
    global $conexion;
    $query = "UPDATE avisos SET ESTATUS = 0 WHERE ID_AVISOS = 4";
    $result = mysqli_query($conexion, $query);
    return $result;
}
