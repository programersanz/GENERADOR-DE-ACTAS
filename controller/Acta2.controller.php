<?php
require_once "modelo/usuarios.php";
require_once "modelo/acta.php";
require_once "modelo/rol.php";
require_once "modelo/basededatos.php";

class Acta2Controller {
    private $modelo;

    public function __CONSTRUCT() {
        $this->modelo = new acta;
    }

    public function Inicio() {
        require_once "vista/admin/cabecera/cabecera.php";
        require_once "vista/actas/index.php";
        require_once "vista/admin/footer/footer.php";
    }
    
    public function Borrar() {
    $id = $_GET["id"] ?? null;
    if ($id) {
        $this->modelo->Eliminar($id);
    }
    // Redireccionar a través del controlador y acción correctos
    header("Location: ?c=Acta2&a=ConsultarFicha2");
    exit();
}
public function ConsultarFicha2() {

    require_once "vista/usuario/cabecera/cabecera.php";
    require_once "vista/usuario/contenido/ConsultarFicha2.php";
    require_once "vista/admin/footer/footer.php";
    
}


    public function Menu()
    {
        try {
            // Obtener el ID de la ficha desde GET
            $id = $_GET["id"] ?? null;
    
            // Validación del ID
            if (!$id || !is_numeric($id)) {
                throw new Exception("No se recibió un ID válido.");
            }
    
            // Log para depuración
            error_log("Ficha recibida: " . $id);
    
            // Obtener las actas asociadas a la ficha
            $actal = $this->modelo->listUnic($id);
    
            // Verificación del resultado
            if (empty($actal)) {
                error_log("No se encontraron actas para la ficha: " . $id);
            } else {
                foreach ($actal as $a) {
                    error_log("Acta: " . $a->getN_acta() . ", Ficha: " . $a->getFicha() . ", Fecha: " . $a->getFecha());
                }
            }
    
            // Cargar vistas
            require_once "vista/usuario/cabecera/cabecera.php";
            require_once "vista/usuario/contenido/actas2.php";  // Asegúrate de que esta vista use correctamente $actal
            require_once "vista/usuario/footer/footer.php";
    
        } catch (Exception $e) {
            error_log("Error en Menu: " . $e->getMessage());
            echo "<p class='text-danger'>Error al cargar actas: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    }
      
}
?>
