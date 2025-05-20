<?php
require_once "modelo/usuarios.php";
require_once "modelo/acta.php";
require_once "modelo/rol.php";
require_once "modelo/basededatos.php";

class UsuariosController {
    private $modelo;

    public function __CONSTRUCT() {
        $this->modelo = new usuario();
    }

    public function Inicio() {
        require_once "vista/admin/cabecera/cabecera.php";
        require_once "vista/actas/index.php";
        require_once "vista/admin/footer/footer.php";
    }

    public function save() {
        $usuario = new usuario();

        $usuario->setNombre($_POST['nombre']);
        $usuario->setApellido($_POST['apellido']);
        $usuario->setCorreo($_POST['correo']);
        $usuario->setRol($_POST['rol']);
        $usuario->setTelefono($_POST['telefono']);
        $usuario->setContrasena($_POST['contrasena']);
        $usuario->setDocumento($_POST['documento']);

        $usuario->insertar();

        header("Location: ?c=vistas&a=usuario");
        exit;
    }

    public function validar() {
        session_start();

        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];

        $usuario = $this->modelo->login($correo, $contrasena);

        if ($usuario) {
            $_SESSION['user'] = $usuario;
            $id_rol = $usuario->getRol();

            if ($id_rol == 1) {
                // Redireccionar a admin
                header("Location: ?c=Vistas&a=ConsultarFicha");
                exit;
            } elseif ($id_rol == 2) {
                // Redireccionar a instructor
                header("Location: ?c=Vistas&a=ConsultarFicha2");
                exit;
            } else {
                // Rol desconocido
                header("Location: ?c=inicio&a=inicio");
                exit;
            }
        } else {
            // Login fallido
            header("Location: ?c=inicio&a=inicio");
            exit;
        }
    }

    public function Guardarusu() {
        $usuario = new usuario();
        $usuario->setId($_POST['id']);
        $usuario->setNombre($_POST['nombre']);
        $usuario->setApellido($_POST['apellido']);
        $usuario->setCorreo($_POST['correo']);
        $usuario->setTelefono($_POST['telefono']);
        $usuario->setContrasena($_POST['contrasena']);
        $usuario->setDocumento($_POST['documento']);

        if ($usuario->getId() > 0) {
            $this->modelo->Actualizarusu($usuario);
        }

        header("Location: ?c=vistas&a=Usuario");
        exit;
    }

    public function GuardarContra() {
        $usuario = new usuario();
        $usuario->setId($_POST['id']);
        $usuario->setContrasena($_POST['contrasena']);

        if ($usuario->getId() > 0) {
            $this->modelo->ActualizarContraseña($usuario);
        }

        header("Location: ?c=vistas&a=Usuario");
        exit;
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: ?c=Vistas&a=Home");
        exit;
    }

    public function Borrarusu() {
        $this->modelo->Eliminarusu($_GET["id"]);
        header("Location: ?c=vistas&a=Usuario");
        exit;
    }

    public function Editusu() {
        if (isset($_GET['id'])) {
            $p = $this->modelo->Obtenerusu($_GET['id']);
            require_once "vista/admin/cabecera/cabecera.php";
            require_once "vista/admin/contenido/usuariosedit.php";
            require_once "vista/admin/footer/footer.php";
        }
    }

    public function EditContra() {
        if (isset($_GET['id'])) {
            $p = $this->modelo->ObtenerContra($_GET['id']);
            require_once "vista/admin/cabecera/cabecera.php";
            require_once "vista/admin/contenido/cambiarContraseña.php";
            require_once "vista/admin/footer/footer.php";
        }
    }
}
