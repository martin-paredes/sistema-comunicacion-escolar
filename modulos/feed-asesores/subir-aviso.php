<?php
session_start();
require_once("../conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
    $fechaInicial = mysqli_real_escape_string($conexion, $_POST['fechaInicial']);
    $fechaFinal = mysqli_real_escape_string($conexion, $_POST['fechaFinal']);
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

    $semestres = array("../../avisos/semestres_1_2", "../../avisos/semestres_3_4", "../../avisos/semestres_5_6");
    for ($i = 0; $i < count($semestres); $i++) {
        if (!is_dir($semestres[$i])) {
            mkdir($semestres[$i], 0777, true);
        }
    }

    if ($check !== false) {
        echo "Archivo es una imagen - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Archivo no es una imagen.";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        echo "Lo siento, el archivo ya existe.";
        $uploadOk = 0;
    }

    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "El archivo es demasiado grande.";
        $uploadOk = 0;
    }

    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Lo siento, solo se permiten archivos JPG, JPEG y PNG.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Lo siento, hubo un error al subir tu archivo.";
    } else {
        $image = basename($_FILES["fileToUpload"]["name"]);
        $semestreId = $_SESSION['SEMESTRE_ID'];
        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $semestres[$semestreId - 1] . '/' . $image)) {
            echo "El archivo " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " ha sido subido.";
            $query = "INSERT INTO avisos (DESCRIPCION, FECHA_INICIO, FECHA_FIN, ACTIVO, ESTATUS, RUTA, SEMESTRE) VALUES ('$descripcion', '$fechaInicial', '$fechaFinal', 1, 1, '$image', $semestreId)";
            $result = mysqli_query($conexion, $query);
        } else {
            echo 'Lo siento, hubo un error al subir tu archivo.';
        }
    }
}

header("location: index.php");

exit;
