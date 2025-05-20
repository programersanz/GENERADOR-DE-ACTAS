<?php
session_start();
include('dbconfig.php');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['save_excel_data'])) {

    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if (in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = 0;
        $msg = false; 

        foreach ($data as $row) {
            if ($count > 0) { // Omitimos la primera fila (encabezados)
                $programa = mysqli_real_escape_string($con, $row[0]);

                if (!empty($programa)) { // Validamos que el campo no esté vacío
                    $query = "INSERT INTO programa (programa) VALUES ('$programa')";
                    $result = mysqli_query($con, $query);

                    if ($result) {
                        $msg = true;
                    }
                }
            } else {
                $count = 1; // Saltamos la primera fila
            }
        }

        if ($msg) {
            $_SESSION['message'] = "Archivo importado correctamente";
        } else {
            $_SESSION['message'] = "No se importaron datos válidos";
        }
        header('Location:../?c=vistas&a=RegistroPrograma');
        exit(0);

    } else {
        $_SESSION['message'] = "Archivo inválido. Solo se permiten formatos XLS, CSV y XLSX.";
        header('Location:../?c=vistas&a=RegistroPrograma');
        exit(0);
    }
}
?>