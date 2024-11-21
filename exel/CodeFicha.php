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
        
        $count = "0";
            foreach ($data as $row) {

                if($count > 0)
                {
                    $ficha_contador =  $row['0'];
                    $N_ficha =  $row['1'];
                    $cantidad_apre = $row['2'];
                    $programa =$row['3'];
                    $jornada = $row['4'];
                    $tipo_forma =$row['5'];
                    $fecha_inicio =  $row['6'];
                    $fecha_fin =  $row['7'];
    
                  $ficha= "INSERT INTO ficha (ficha_contador,N_ficha, cantidad_apre, programa, jornada, tipo_forma, fecha_inicio, fecha_fin) VALUES ('$ficha_contador','$N_ficha', '$cantidad_apre', '$programa', '$jornada', '$tipo_forma', '$fecha_inicio', '$fecha_fin')";
                  $result = mysqli_query($con, $ficha);
                  $msg = true;
                }
                else
                {
                    $count = "1";
                }

            }

           if (isset($msg)) {
                $_SESSION['message']="Archivo valido";
                header('Location:../?c=vistas&a=RegistroFicha');
                exit(0);
            }else {
                $_SESSION['message']="Archivo no importado";
                header('Location:../?c=vistas&a=RegistroFicha');
                exit(0);
            }
    }
    else{
        $_SESSION['message']="Archivo invalido";
        header('Location:../?c=vistas&a=RegistroFicha');
        exit(0);
    }


}
?>