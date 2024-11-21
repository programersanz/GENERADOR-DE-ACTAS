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
                    $nombre =  $row['0'];
                    $apellido = $row['1'];
                    $correo =$row['2'];
                    $rol = $row['3'];
                    $telefono =$row['4'];
                    $contrasena =  $row['5'];
                    $documento =  $row['6'];
    
                  $aprendiz= "INSERT INTO usuario (nombre, apellido,correo, rol, telefono, contrasena, documento) VALUES ('$nombre', '$apellido', '$correo', '$rol', '$telefono', '$contrasena', '$documento')";
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
                header('Location:../?c=vistas&a=Registrar');
                exit(0);
            }else {
                $_SESSION['message']="Archivo no importado";
                header('Location:../?c=vistas&a=Registrar');
                exit(0);
            }
    }
    else{
        $_SESSION['message']="Archivo invalido";
        header('Location:../?c=vistas&a=Registrar');
        exit(0);
    }


}
?>