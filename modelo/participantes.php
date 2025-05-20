<?php

class Participantes {
    private $id = null;
    private $nombre = null;
    private $cargo = null;
    private $asistencia = null;
    private $n_acta = null;
    private $PDO;

    public function __CONSTRUCT() {
        $this->PDO = BaseDeDatos::conectar();
    }

    // ✅ Obtener participantes de un acta específica
    public function ObtenerParticipantes($ficha) {
        try {
            $query = $this->PDO->prepare("SELECT * FROM participantes WHERE n_acta = ?");
            $query->execute([$ficha]);
            return $query->fetchAll(PDO::FETCH_CLASS, __CLASS__);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // ✅ Eliminar un acta si existe
    public function delete() {
        try {
            if ($this->n_acta !== null) {
                $query = "DELETE FROM acta WHERE n_acta = ?";
                $this->PDO->prepare($query)->execute([$this->n_acta]);
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // ✅ Listar todos los usuarios
    public function Listarusu() {
        try {
            $consulta = $this->PDO->prepare("SELECT * FROM usuario;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // ✅ Obtener una acta específica
    public function Obtener($id) {
        try {
            $consulta = $this->PDO->prepare("SELECT * FROM acta WHERE n_acta = ?");
            $consulta->execute([$id]);
            $r = $consulta->fetch(PDO::FETCH_OBJ);
            if (!$r) return null; // Si no existe, retorna null

            $p = new Acta();
            $p->setN_acta($r->n_acta);
            $p->setNom_rev($r->nom_rev);
            $p->setCiudad($r->ciudad);
            $p->setFecha($r->fecha);
            $p->setHora_fin($r->hora_fin);
            $p->setHora_in($r->hora_in);
            $p->setLu_en($r->lu_en);
            $p->setDireccion($r->direccion);
            $p->setAgenda($r->agenda);
            $p->setObjetivos($r->objetivos);
            $p->setConclusion($r->conclusion);
            $p->setFicha($r->ficha);
            $p->setPrograma($r->programa);
            return $p;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // ✅ Listar todas las actas
    public function Listar() {
        try {
            $consulta = $this->PDO->prepare("SELECT * FROM acta;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // ✅ Listar participantes por ID
    public function Listaparti($id) {
        try {
            $consulta = $this->PDO->prepare("SELECT * FROM participantes WHERE id = ?;");
            $consulta->execute([$id]);
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // ✅ Insertar participantes de forma segura
    public function insertarparticipantes($participantes) {
        try {
            if (!is_array($participantes) || empty($participantes)) {
                die("Error: No hay participantes para insertar.");
            }

            $sql = "INSERT INTO participantes (id_ficha, nombre, documento) VALUES (?, ?, ?)";
            $stmt = $this->PDO->prepare($sql);

            foreach ($participantes as $participante) {
                $stmt->execute([
                    $participante['id_ficha'],
                    $participante['nombre'],
                    $participante['documento']
                ]);
            }

            echo "Participantes insertados correctamente.";
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // ✅ Obtener la última acta
    public function ListarActas() {
        try {
            $consulta = $this->PDO->prepare("SELECT * FROM acta ORDER BY n_acta DESC LIMIT 1");
            $consulta->execute();
            if ($consulta->rowCount() == 0) {
                return null; // Retorna null si no hay datos
            }
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // ✅ Métodos Getters y Setters
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; return $this; }
    public function getNombre() { return $this->nombre; }
    public function setNombre($nombre) { $this->nombre = $nombre; return $this; }
    public function getApellido() { return $this->apellido; }
    public function setApellido($apellido) { $this->apellido = $apellido; return $this; }
    public function getCargo() { return $this->cargo; }
    public function setCargo($cargo) { $this->cargo = $cargo; return $this; }
    public function getAsistencia() { return $this->asistencia; }
    public function setAsistencia($asistencia) { $this->asistencia = $asistencia; return $this; }
}
