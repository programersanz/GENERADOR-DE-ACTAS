<?php
session_start();
include('dbconfig.php');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['save_excel_data'])) {

    // Validamos que el archivo haya sido subido correctamente
    if (!isset($_FILES['import_file']['name']) || $_FILES['import_file']['error'] !== UPLOAD_ERR_OK) {
        $_SESSION['message'] = "Error al subir el archivo.";
        header('Location: ../?c=vistas&a=Registrar');
        exit();
    }

    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if (in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        // Inicializamos la variable de mensaje
        $msg = false;
        $rowIndex = 0;

        // Preparamos la consulta para evitar SQL Injection
        $stmt = $con->prepare("INSERT INTO usuario (nombre, apellido, correo, rol, telefono, contrasena, documento) VALUES (?, ?, ?, ?, ?, ?, ?)");

        foreach ($data as $row) {
            if ($rowIndex > 0) { // Ignorar la primera fila (encabezados)
                $nombre = trim($row[0]);
                $apellido = trim($row[1]);
                $correo = trim($row[2]);
                $rol = trim($row[3]);
                $telefono = trim($row[4]);
                $contrasena = trim($row[5]);
                $documento = trim($row[6]);

                // Validamos que no haya valores vacíos antes de insertar
                if (!empty($nombre) && !empty($apellido) && !empty($correo) && !empty($rol) && !empty($telefono) && !empty($contrasena) && !empty($documento)) {
                    $stmt->bind_param("sssssss", $nombre, $apellido, $correo, $rol, $telefono, $contrasena, $documento);
                    $stmt->execute();
                    $msg = true;
                }
            }
            $rowIndex++;
        }

        $stmt->close(); // Cerramos la consulta

        // Mensajes de éxito o error
        if ($msg) {
            $_SESSION['message'] = "Archivo importado correctamente.";
        } else {
            $_SESSION['message'] = "No se importaron datos válidos.";
        }
    } else {
        $_SESSION['message'] = "Archivo inválido. Debe ser un archivo Excel (.xls, .xlsx) o CSV.";
    }

    header('Location: ../?c=vistas&a=Registrar');
    exit();
}
?>
