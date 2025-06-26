<?php


require_once "modelo/basededatos.php";
$conexion = BaseDeDatos::Conectar();


class BaseDeDatos
{
    // Definir los parámetros de la base de datos
    private static $server = 'localhost'; // Servidor de la base de datos
    private static $port = '3306';        // Puerto de conexión
    private static $dbName = 'acta_completas'; // Nombre de la base de datos
    private static $dbUser = 'root';      // Usuario de la base de datos
    private static $dbPass = '';          // Contraseña de la base de datos

    // Método para establecer la conexión
    public static function Conectar()
    {
        try {
            // Crear el DSN para la conexión PDO
            $dsn = 'mysql:host=' . self::$server . ';port=' . self::$port . ';dbname=' . self::$dbName . ';charset=utf8';
            
            // Crear el objeto PDO
            $PDO = new PDO($dsn, self::$dbUser, self::$dbPass);
            
            // Configurar el atributo de error de PDO para que lance excepciones
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Devolver el objeto PDO
            return $PDO;

        } catch (PDOException $e) {
            // Lanzar una excepción si ocurre un error en la conexión
            throw new Exception("Error de conexión: " . $e->getMessage());
        }
    }
}

?>
