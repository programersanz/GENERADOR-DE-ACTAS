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
                    $medida_formativa =  $row['0'];
                    $descripcion_medida =  $row['1'];
              
    
                  $faltas= "INSERT INTO medida_formativa (medida_formativa, descripcion_medida) VALUES ('$medida_formativa','$descripcion_medida')";
                  $result = mysqli_query($con, $faltas);
                  $msg = true;
                }
                else
                {
                    $count = "1";
                }

            }

           if (isset($msg)) {
                $_SESSION['message']="Archivo valido";
                header('Location:../?c=vistas&a=RegistroPrograma');
                exit(0);
            }else {
                $_SESSION['message']="Archivo no importado";
                header('Location:../?c=vistas&a=RegistroPrograma');
                exit(0);
            }
    }
    else{
        $_SESSION['message']="Archivo invalido";
        header('Location:../?c=vistas&a=RegistroPrograma');
        exit(0);
    }


}
?>