<?php
session_start();
include('dbconfig.php'); // Asegúrate de que define correctamente la conexión $con
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['save_excel_data'])) {

    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if (in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        // Verificar conexión
        if (!$con) {
            $_SESSION['message'] = "Error de conexión a la base de datos";
            header('Location: ../?c=vistas&a=RegistroUsuExternos');
            exit(0);
        }

        // Preparar consulta con parámetros
        $stmt = mysqli_prepare($con, "INSERT INTO funcionario (nombre, apellido, tipodocf, documentof, correof, cargo) VALUES (?, ?, ?, ?, ?, ?)");

        if (!$stmt) {
            $_SESSION['message'] = "Error en la preparación de la consulta";
            header('Location: ../?c=vistas&a=RegistroUsuExternos');
            exit(0);
        }

        // Omitir la primera fila si contiene encabezados
        $firstRow = true;
        $successCount = 0;

        foreach ($data as $row) {
            if ($firstRow) {
                $firstRow = false;
                continue; // Saltar la primera fila
            }

            $nombre = trim($row[0] ?? '');
            $apellido = trim($row[1] ?? '');
            $tipodocf = trim($row[2] ?? '');
            $documentof = trim($row[3] ?? '');
            $correof = trim($row[4] ?? '');
            $cargo = trim($row[5] ?? '');

            // Validar que no estén vacíos los campos esenciales
            if ($nombre && $apellido && $documentof) {
                mysqli_stmt_bind_param($stmt, "ssssss", $nombre, $apellido, $tipodocf, $documentof, $correof, $cargo);
                if (mysqli_stmt_execute($stmt)) {
                    $successCount++;
                }
            }
        }

        // Cerrar la consulta preparada
        mysqli_stmt_close($stmt);

        // Mensaje final
        if ($successCount > 0) {
            $_SESSION['message'] = "Se importaron $successCount registros correctamente";
        } else {
            $_SESSION['message'] = "No se importaron datos, verifica el archivo";
        }

        header('Location: ../?c=vistas&a=RegistroUsuExternos');
        exit(0);
    } else {
        $_SESSION['message'] = "Formato de archivo no permitido";
        header('Location: ../?c=vistas&a=RegistroUsuExternos');
        exit(0);
    }
}
?>