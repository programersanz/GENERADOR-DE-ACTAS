<?php

class reglamento {

private $e = null;
private $id_regla = null;
private $nombre_falta = null;

private $PDO; // Variable para almacenar la conexión PDO

// Constructor
public function __CONSTRUCT(){
    $this->PDO = BaseDeDatos::conectar(); // Establecer la conexión con la base de datos
}

// Método para obtener los reglamentos desde la base de datos
public function obtenerReglamento() {
    try {
        // Verificar si la conexión es válida
        if ($this->PDO instanceof PDO) {
            $query = $this->PDO->prepare("SELECT * FROM reglamento"); // Preparar consulta
            $query->execute(); // Ejecutar la consulta
            return $query->fetchAll(PDO::FETCH_CLASS, __CLASS__); // Retornar todos los registros
        } else {
            die("Error: La conexión a la base de datos no es válida.");
        }
    } catch (Exception $e) {
        // Capturamos cualquier error que ocurra durante la consulta
        die("Error al obtener reglamento: " . $e->getMessage());
    }
}

// Método para actualizar un programa
public function ActualizarPrograma(programa $programa) {
    try {
        // Verificar si la conexión es válida
        if ($this->PDO instanceof PDO) {
            $consulta = "UPDATE programa SET programa = ? WHERE id_programa = ?";
            $this->PDO->prepare($consulta)
                      ->execute(array(
                          $programa->getPrograma(),
                          $programa->getId_programa()
                      ));
        } else {
            die("Error: La conexión a la base de datos no es válida.");
        }
        // Redirigir después de actualizar
        header("Location:?c=vistas&a=ConsultarPrograma"); 
    } catch (Exception $e) {
        // Capturar cualquier error durante la actualización
        die("Error al actualizar programa: " . $e->getMessage());
    }
}

// Método para insertar un nuevo programa en la base de datos
public function insertar() {
    try {
        // Verificar si la conexión es válida
        if ($this->PDO instanceof PDO) {
            $query = "INSERT INTO programa (programa) VALUES (?);"; // Consulta de inserción
            $this->PDO->prepare($query)
                      ->execute(array($this->programa)); // Ejecutar la consulta con el valor de programa
            $this->n_acta = $this->PDO->lastInsertId(); // Obtener el ID del último registro insertado
            return $this; // Retornar el objeto actual
        } else {
            die("Error: La conexión a la base de datos no es válida.");
        }
    } catch (Exception $e) {
        // Capturar cualquier error al insertar el registro
        die("Error al insertar programa: " . $e->getMessage());
    }
}

// Método para eliminar un programa
public function EliminarPro($id_programa) {
    try {
        // Verificar si la conexión es válida
        if ($this->PDO instanceof PDO) {
            $consulta = "DELETE FROM programa WHERE id_programa = ?";
            $this->PDO->prepare($consulta)
                      ->execute(array($id_programa)); // Ejecutar la consulta de eliminación
        } else {
            die("Error: La conexión a la base de datos no es válida.");
        }
    } catch (Exception $e) {
        // Capturar cualquier error durante la eliminación
        die("Error al eliminar programa: " . $e->getMessage());
    }
}

// Getters y Setters
public function getId_regla() {
    return $this->id_regla;
}

public function setId_regla($id_regla) {
    $this->id_regla = $id_regla;
    return $this;
}

public function getNombre_falta() {
    return $this->nombre_falta;
}

public function setNombre_falta($nombre_falta) {
    $this->nombre_falta = $nombre_falta;
    return $this;
}
}

?>