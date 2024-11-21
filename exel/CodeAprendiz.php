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
                    $Ficha =  $row['0'];
                    $Tipo=$row['1'];
                    $Numero = $row['2'];
                    $Nombre_aprendiz =$row['3'];
                    $Apellido_aprendiz = $row['4'];
                    $Celular = $row['5'];
                    $Correo =$row['6'];
                    $Estado =  $row['7'];
    
                  $aprendiz= "INSERT INTO aprendiz (ficha, Tipo, Numero, Nombre_aprendiz, Apellido_aprendiz, Celular, Correo, Estado) VALUES ('$Ficha','$Tipo','$Numero','$Nombre_aprendiz', '$Apellido_aprendiz', '$Celular', '$Correo', '$Estado')";
                  $result = mysqli_query($con, $aprendiz);
                  $msg = true;
                }
                else
                {
                    $count = "1";
                }

            }

           if (isset($msg)) {
                $_SESSION['message']="Archivo valido";
                header('Location:../?c=vistas&a=RegistroAprendiz');
                exit(0);
            }else {
                $_SESSION['message']="Archivo no importado";
                header('Location:../?c=vistas&a=RegistroAprendiz');
                exit(0);
            }
    }
    else{
        $_SESSION['message']="Archivo invalido";
        header('Location:../?c=vistas&a=RegistroAprendiz');
        exit(0);
    }


}
?>