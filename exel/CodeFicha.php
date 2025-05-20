<?php
session_start();
include('dbconfig.php');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['save_excel_data'])){

    $fileName= $_FILES['import_file']['name'];
    $file_ext= pathinfo($fileName, PATHINFO_EXTENSION);
    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if (in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();
        
        $count = 0;
        foreach ($data as $row) {
            if($count > 0) {
                // Validación y escape de datos
                $ficha_contador = mysqli_real_escape_string($con, $row[0]);
                $N_ficha = mysqli_real_escape_string($con, $row[1]);
                $cantidad_apre = is_numeric($row[2]) ? $row[2] : 0;
                $programa = mysqli_real_escape_string($con, $row[3]);
                $jornada = mysqli_real_escape_string($con, $row[4]);
                $tipo_forma = mysqli_real_escape_string($con, $row[5]);
                $fecha_inicio = mysqli_real_escape_string($con, $row[6]);
                $fecha_fin = mysqli_real_escape_string($con, $row[7]);
                $fecha_iniciop = mysqli_real_escape_string($con, $row[8]);
                $fecha_finp = mysqli_real_escape_string($con, $row[9]);

                // Validación antes de insertar
                if (!empty($ficha_contador) && !empty($N_ficha) && is_numeric($cantidad_apre)) {
                    $ficha = "INSERT INTO ficha (ficha_contador, N_ficha, cantidad_apre, programa, jornada, tipo_forma, fecha_inicio, fecha_fin, fecha_iniciop, fecha_finp) 
                              VALUES ('$ficha_contador', '$N_ficha', '$cantidad_apre', '$programa', '$jornada', '$tipo_forma', '$fecha_inicio', '$fecha_fin', '$fecha_iniciop', '$fecha_finp')";
                    $result = mysqli_query($con, $ficha);

                    if (!$result) {
                        die("Error en la consulta: " . mysqli_error($con));
                    }

                    $msg = true;
                }
            } else {
                $count = 1; // Saltar la primera fila (encabezados)
            }
        }

        if (isset($msg)) {
            $_SESSION['message'] = "Archivo válido";
            header('Location:../?c=vistas&a=RegistroFicha');
            exit(0);
        } else {
            $_SESSION['message'] = "Archivo no importado";
            header('Location:../?c=vistas&a=RegistroFicha');
            exit(0);
        }
    } else {
        $_SESSION['message'] = "Archivo inválido";
        header('Location:../?c=vistas&a=RegistroFicha');
        exit(0);
    }
}
?>