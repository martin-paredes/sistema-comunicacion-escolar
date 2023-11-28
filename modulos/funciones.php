<?php

require_once("../conexion.php");

function getAsesor()
{
    global $conexion;
    $query = "SELECT * FROM asesores AS A WHERE A.SEMESTRE = " . $_SESSION['SEMESTRE_ID'];
    $result = mysqli_query($conexion, $query);
    return $result;
}

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
    $query = "SELECT * FROM avisos AS AV WHERE AV.SEMESTRE = " . $_SESSION['SEMESTRE_ID'] . " AND AV.ESTATUS = 1";
    $result = mysqli_query($conexion, $query);
    return $result;
}

function getAvisosAlumnos()
{
    global $conexion;
    $query = "SELECT * FROM avisos AS AV WHERE AV.SEMESTRE = " . $_SESSION['SEMESTRE_ID'] . " AND AV.ESTATUS = 1 AND AV.ACTIVO = 1";
    $result = mysqli_query($conexion, $query);
    return $result;
}
