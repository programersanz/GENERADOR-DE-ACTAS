<?php
require_once "modelo/usuarios.php";
require_once "modelo/acta.php";
require_once "modelo/rol.php";
require_once "modelo/participantes.php";
require_once "modelo/basededatos.php";
require_once "modelo/conclusiones.php";


class conclusion {
    private $modelo;

    public function prueba2() {
        $this->modelo = new Acta(); // Asegúrate de que la clase se llame Acta (con mayúscula)
    }

    public function Inicio() {
        require_once "vista/admin/cabecera/cabecera.php";
        require_once "vista/actas/index.php"; // Redirección correcta de la vista
        require_once "vista/admin/footer/footer.php";
    }

    public function save() {
        // Instanciar la clase 'conclusion' correctamente
        $conclusion = new Conclusion();

        // Verificar que el método 'prueba2' existe en la clase 'conclusion'
        $conclusion->prueba2();

        // Redirección a la página después del registro exitoso
        header("Location: ?c=vistas&a=ConsultarFicha");
        exit(); // Se recomienda usar 'exit()' en lugar de 'die()' para terminar el script
    }
}
