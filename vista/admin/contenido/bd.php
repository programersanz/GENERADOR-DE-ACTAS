<?php

class BaseDeDatos
{
    private static $server = 'localhost;port=3306';

    private static $dbName = 'acta_completas';
    private static $dbUser = 'root';
    private static $dbPass = ''; 

    public static function Conectar()
    {
        try{
            $PDO = new PDO('mysql:host='.self::$server.';dbname='.self::$dbName.';charset=utf8',self::$dbUser,self::$dbPass);
            $PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            return $PDO;
        }catch(PDOException $e){
            return "Error: ".$e->getMessage();

        }
    }
}

?>