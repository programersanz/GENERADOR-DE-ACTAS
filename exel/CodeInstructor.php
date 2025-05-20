<?php
session_start();
include('dbconfig.php');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if(isset($_POST['save_excel_data'])){

    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if (in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();
        
        $count = 0;
        $imported = 0; // Contador de registros insertados

        foreach ($data as $row) {
            if ($count == 0) { // Saltar encabezado
                $count++;
                continue;
            }

            $nombre = mysqli_real_escape_string($con, $row[0]);
            $apellido = mysqli_real_escape_string($con, $row[1]);
            $tipodoc = mysqli_real_escape_string($con, $row[2]);
            $documento = mysqli_real_escape_string($con, $row[3]);
            $telefono = mysqli_real_escape_string($con, $row[4]);
            $rol = mysqli_real_escape_string($con, $row[5]);
            $correo = mysqli_real_escape_string($con, $row[6]);
            $contrasena = mysqli_real_escape_string($con, $row[7]);

            $sql = "INSERT INTO instructor (nombre, apellido, tipodoc, documento, telefono, rol, correo, contraseña) 
                    VALUES ('$nombre', '$apellido', '$tipodoc', '$documento', '$telefono', '$rol', '$correo', '$contrasena')";

            if (mysqli_query($con, $sql)) {
                $imported++; // Aumentar contador si la inserción es exitosa
            } else {
                error_log("Error al insertar instructor: " . mysqli_error($con)); // Registrar error en log
            }
        }

        if ($imported > 0) {
            $_SESSION['message'] = "Se importaron $imported registros correctamente.";
        } else {
            $_SESSION['message'] = "No se importaron datos. Verifica el archivo.";
        }

        header('Location: ../?c=vistas&a=RegistroInstructor');
        exit;
    } else {
        $_SESSION['message'] = "Archivo inválido. Debe ser .xls, .xlsx o .csv.";
        header('Location: ../?c=vistas&a=RegistroInstructor');
        exit;
    }
}
?>
