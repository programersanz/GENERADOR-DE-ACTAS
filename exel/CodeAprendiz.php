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

            // Limpieza de datos para prevenir SQL Injection
            $Ficha = mysqli_real_escape_string($con, $row[0]);
            $Tipo = mysqli_real_escape_string($con, $row[1]);
            $Numero = mysqli_real_escape_string($con, $row[2]);
            $Nombre_aprendiz = mysqli_real_escape_string($con, $row[3]);
            $Apellido_aprendiz = mysqli_real_escape_string($con, $row[4]);
            $Celular = mysqli_real_escape_string($con, $row[5]);
            $Correo = mysqli_real_escape_string($con, $row[6]);
            $Estado = mysqli_real_escape_string($con, $row[7]);

            // Query de inserción
            $sql = "INSERT INTO aprendiz (ficha, Tipo, Numero, Nombre_aprendiz, Apellido_aprendiz, Celular, Correo, Estado) 
                    VALUES ('$Ficha', '$Tipo', '$Numero', '$Nombre_aprendiz', '$Apellido_aprendiz', '$Celular', '$Correo', '$Estado')";

            if (mysqli_query($con, $sql)) {
                $imported++; // Contador de registros insertados correctamente
            } else {
                error_log("Error al insertar aprendiz: " . mysqli_error($con)); // Guardar error en logs
            }
        }

        // Mensajes según el resultado de la importación
        if ($imported > 0) {
            $_SESSION['message'] = "Se importaron $imported registros correctamente.";
        } else {
            $_SESSION['message'] = "No se importaron datos. Verifica el archivo.";
        }

        header('Location: ../?c=vistas&a=RegistroAprendiz');
        exit;
    } else {
        $_SESSION['message'] = "Archivo inválido. Debe ser .xls, .xlsx o .csv.";
        header('Location: ../?c=vistas&a=RegistroAprendiz');
        exit;
    }
}
?>
