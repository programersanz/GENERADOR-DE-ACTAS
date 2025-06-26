<?php
// Parámetros de conexión
$host = 'localhost';
$port = '3306';
$dbname = 'acta_completas';
$user = 'root';
$pass = '';

try {
    // Crear conexión PDO
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<h3 style='color:green;'>✅ Conexión exitosa a la base de datos usando PDO.</h3>";

    // Verificar si existe la tabla 'actas'
    $stmt = $pdo->query("SHOW TABLES LIKE 'acta'");
    if ($stmt->rowCount() > 0) {
        echo "<p style='color:green;'>✅ La tabla <strong>actas</strong> existe.</p>";

        // Verificar si la tabla tiene registros
        $stmt = $pdo->query("SELECT COUNT(*) FROM acta");
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            echo "<p style='color:green;'>✅ La tabla tiene <strong>$count</strong> registros.</p>";
        } else {
            echo "<p style='color:orange;'>⚠️ La tabla existe, pero no contiene registros.</p>";
        }
    } else {
        echo "<p style='color:red;'>❌ La tabla <strong>actas</strong> no existe en la base de datos.</p>";
    }
} catch (PDOException $e) {
    echo "<h3 style='color:red;'>❌ Error de conexión: " . htmlspecialchars($e->getMessage()) . "</h3>";
}
?>