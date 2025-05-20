<?php
require_once "modelo/usuarios.php";
require_once "modelo/acta.php";
require_once "modelo/rol.php";
require_once "modelo/participantes.php";
require_once "modelo/basededatos.php";
require_once "modelo/conclusiones.php";
require_once "modelo/particulares.php";
require_once "modelo/funcionario.php";
require_once "modelo/casos_anteriores.php";
require_once "modelo/reglamento.php";
require_once "modelo/medida.php";
require_once "modelo/destacados.php";
require_once "modelo/desarrollocomite.php";
require_once "modelo/rar.php";

class ActaController {
    private $modelo;

    public function __CONSTRUCT() {
        $this->modelo = new acta;
    }

    public function Inicio() {
        require_once "vista/admin/cabecera/cabecera.php";
        require_once "vista/actas/index.php";
        require_once "vista/admin/footer/footer.php";
    }

    public function Guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $acta = new acta();
                $acta->insertar(); // Aquí se hace todo el proceso de guardado
    
                // Si `insertar()` no lanza una excepción, ya respondió exitosamente con json_encode y exit.
                // Por lo tanto, no hace falta volver a enviar una respuesta aquí.
    
            } catch (Exception $e) {
                // Captura cualquier excepción que se haya escapado de insertar()
                echo json_encode([
                    "success" => false,
                    "message" => "Error al guardar: " . $e->getMessage()
                ]);
            }
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Método no permitido."
            ]);
        }
    }
    

    public function Borrar() {
        $id = $_GET["id"] ?? null;
        if ($id) {
            $this->modelo->Eliminar($id);
        }
        header("location:?c=vistas&a=ConsultarFicha");
    }

    public function FormCrear() {
        if (isset($_GET['id'])) {
            $p = $this->modelo->Obtener($_GET['id']);
            require_once "vista/admin/cabecera/cabecera.php";
            require_once "vista/admin/contenido/editar.php";
            require_once "vista/admin/footer/footer.php";
        }
    }

    public function FormCrearimp() {
        if (isset($_GET['id'])) {
            $p = $this->modelo->Obtener($_GET['id']);
            require_once "vista/admin/cabecera/cabecera.php";
            require_once "vista/usuario/contenido/consultar.php";
            require_once "vista/admin/footer/footer.php";
        }
    }

    public function FormCrearimp2() {
        if (isset($_GET['id'])) {
            $p = $this->modelo->Obtener($_GET['id']);
            require "vista/usuario/contenido/pdf.php";
        }
    }

    public function FormCrearusu() {
        if (isset($_GET['id'])) {
            $p = $this->modelo->Obtener($_GET['id']);
            require_once "vista/usuario/cabecera/cabecera.php";
            require_once "vista/usuario/contenido/consultar.php";
            require_once "vista/usuario/footer/footer.php";
        }
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
            require_once "vista/admin/cabecera/cabecera.php";
            require_once "vista/admin/contenido/actas.php";  // Asegúrate de que esta vista use correctamente $actal
            require_once "vista/admin/footer/footer.php";
    
        } catch (Exception $e) {
            error_log("Error en Menu: " . $e->getMessage());
            echo "<p class='text-danger'>Error al cargar actas: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    }
      

    public function FormCrearficha() {
        $fun = new funcionario();
        $funco = $fun->funcio();

        $reg = new reglamento();
        $reca = $reg->obtenerReglamento();

        $med = new medidaF();
        $medida = $med->obtenermedida_formativa();

        if (isset($_GET['id'])) {
            $p = $this->modelo->Obtenercontenido($_GET['id']);
            require_once "vista/admin/cabecera/cabecera.php";
            require_once "vista/admin/contenido/principal.php";
            require_once "vista/admin/footer/footer.php";
        }
    }
}
?>
