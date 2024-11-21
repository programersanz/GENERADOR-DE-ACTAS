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
                    $telefono = $row ['2'];
                    $rol = $row ['3'];
                    $correo= $row['4'];
                    $contraseña= $row['5'];
    
                  $instructor= "INSERT INTO instructor (nombre, apellido, telefono, rol, correo, contraseña) VALUES ('$nombre', '$apellido', '$telefono', '$rol', '$correo', '$contraseña')";
                  $result = mysqli_query($con, $instructor);
                  $msg = true;
                }
                else
                {
                    $count = "1";
                }

            }

           if (isset($msg)) {
                $_SESSION['message']="Archivo valido";
                header('Location:../?c=vistas&a=RegistroInstructor');
                exit(0);
            }else {
                $_SESSION['message']="Archivo no importado";
                header('Location:../?c=vistas&a=RegistroInstructor');
                exit(0);
            }
    }
    else{
        $_SESSION['message']="Archivo invalido";
        header('Location:../?c=vistas&a=RegistroInstructor');
        exit(0);
    }


}
?>