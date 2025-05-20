<?php

require_once "modelo/ficha.php";
require_once "modelo/acta.php";


class acta{
    
    public function ObtenerDatosFicha($ficha)
    {
        // Implementation of the method
        // Example:
        $sql = "SELECT * FROM fichas WHERE ficha = ?";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute([$ficha]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    
    // Add the missing getter methods
    public function getAprendices_dest()
    {
        return $this->aprendices_dest;
    }
    
    public function getDescargos_apre()
    {
        return $this->descargos_apre;
    }
    

private $contador = null;
private $e = null;
private $descargos_apre;
private $nombre;
private $apellido;
private $cargo;
private $asistencia;
private $C_ficha;
private $C_acta;
private $nombre_aprendiz;
private $tipo;
private $documento;
private $tipo_con;
private $documento_con;
private $nombre_its;
private $description;
private $falta;
private $Aprendiz;
private $aprendices_dest;
private $reglamento;
private $cla_falta;
private $n_ficha;
private $Q_acta;
private $medida;
private $descripcion_m;
private $cumplimiento;
private $id;
private $A_ficha;
private $A_acta;
private $A_aprendiz;
private $A_instructor; 
private $A_descripcion;
private $A_cumplimiento;
private $c_contador; // Added missing property
private $id_destacados;
private $acta_des;
private $nombre_des;
private $apellido_des;
private $id_desarrollo;
private $d_acta;
private $d_nombre_aprendiz;
private $d_descargos_its;
private $d_descargos_its_b;
private $d_descargos_its_c;
private $d_descargos_aprendiz;
private $medida_formativa_comite;
private $inf_jefe_taller;
private $inf_instructores;
private $acta_rar;
private $ficha_rar;
private $fname;
private $name;
private $hechos_actuales; // Added property declaration
private  $n_acta=null;
private  $acta_no=null;
private  $acta_contador =null;
private  $nom_rev =null;
private  $ciudad =null;
private  $fecha =null ;
private  $hora_in =null;
private  $hora_fin =null;
private  $lu_en =null;
private  $direccion =null ;
private  $agenda =null ;
private  $objetivos =null ;
private  $participantes =null ;
private  $inf_ficha =null ;
private  $casos_ant =null ;
private  $casos_part =null ;
private  $desarrollo_comite =null ;
private  $informe_vocero =null ;
private  $informe_subvocero =null ;
private  $conclusiones=null;
private  $ficha =null ;
private  $programa =null;
private  $privacidad =null;
private  $compromisos =null;

private $PDO;
public function __CONSTRUCT(){
    $this->PDO = new PDO('mysql:host=localhost;dbname=acta_completas', 'root', '', [
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

}
public function generarFormularioActa($ficha) {
    // Sanitizar la ficha
    $mensaje = "Formulario Acta generado para la ficha: " . htmlspecialchars($ficha);

    // Retornar el mensaje en lugar de imprimirlo
    return $mensaje;
}




public function VerificarFicha($ficha)
{
    try {
        $ficha = (int)$ficha; // Asegurar que sea entero

        $sql = "SELECT COUNT(*) AS total FROM ficha WHERE id_ficha = ?";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute([$ficha]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        // Retornar verdadero si la ficha existe (total > 0)
        return $resultado['total'] > 0;
    } catch (Exception $e) {
        // Registrar el error en un archivo de log (opcional) y retornar falso
        error_log("Error en VerificarFicha: " . $e->getMessage());
        return false;
    }
}




    public function Actualizar(acta $acta) {
        try {
            $consulta = "UPDATE acta SET
                nom_rev = ?,
                ciudad = ?,
                fecha = ?,
                hora_in = ?,
                hora_fin = ?,
                lu_en = ?,
                direccion = ?,
                agenda = ?,
                objetivos = ?,
                participantes = ?,
                inf_ficha = ?,
                casos_ant = ?,
                aprendices_dest = ?,
                casos_part = ?,
                desarrollo_comite = ?,
                hechos_actuales = ?,
                informe_vocero = ?,
                informe_subvocero = ?,
                descargos_apre = ?,
                conclusiones = ?,
                ficha = ?,
                programa = ?,
                privacidad = ?,
                compromisos = ?
                WHERE n_acta = ?;";
            
            $this->PDO->prepare($consulta)->execute([
                $acta->getNom_rev(),
                $acta->getCiudad(),
                $acta->getFecha(),
                $acta->getHora_in(),
                $acta->getHora_fin(),
                $acta->getLu_en(),
                $acta->getDireccion(),
                $acta->getAgenda(),
                $acta->getObjetivos(),
                $acta->getParticipantes(),
                $acta->getInf_ficha(),
                $acta->getCasos_ant(),
                $acta->getAprendices_dest(),
                $acta->getCasos_part(),
                $acta->getDesarrollo_comite(),
                $acta->getHechos_actuales(),
                $acta->getInforme_vocero(),
                $acta->getInforme_subvocero(),
                $acta->getDescargos_apre(),
                $acta->getConclusiones(),
                $acta->getFicha(),
                $acta->getPrograma(),
                $acta->getPrivacidad(),
                $acta->getCompromisos(),
                $acta->getN_acta()
            ]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            header("location:?c=vistas&a=ConsultarFicha");
            exit();
        }
    }



/*inicio prueba*/


public function insertarCasosEspeciales($nombre_aprendiz, $tipo, $documento, $nombre_its, $description, $falta, $reglamento, $cla_falta)
{
    try {
        $stmt = $this->PDO->prepare("INSERT INTO casos_especiales (
            C_ficha, C_acta, nombre_aprendiz, tipo, documento, nombre_its, description, 
            falta, reglamento, cla_falta
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        for ($i = 0; $i < count($nombre_aprendiz); $i++) {
            $stmt->execute([
                $this->ficha,                  // C_ficha
                $this->n_acta,                 // C_acta
                $nombre_aprendiz[$i] ?? null,  // nombre_aprendiz
                $tipo[$i] ?? null,             // tipo
                $documento[$i] ?? null,        // documento
                $nombre_its[$i] ?? null,       // nombre_its
                $description[$i] ?? null,      // description
                $falta[$i] ?? null,            // falta
                $reglamento[$i] ?? null,       // reglamento
                $cla_falta[$i] ?? null        // clasificación falta
            ]);
        }

        return true;

    } catch (Exception $e) {
        error_log("Error al insertar casos especiales: " . $e->getMessage());
        throw $e;
    }
}




public function insertarAprendicesDestacados() {
    try {
        if (!isset($_REQUEST['acta_des'], $_REQUEST['nombre_des'], $_REQUEST['apellido_des'])) {
            throw new Exception("Datos insuficientes para insertar aprendices destacados.");
        }

        $ACTA_DES = $_REQUEST['acta_des'];
        $NOMBRE_DES = $_REQUEST['nombre_des'];
        $APELLIDO_DES = $_REQUEST['apellido_des'];

        // Validar que los arrays tienen el mismo tamaño
        if (count($NOMBRE_DES) !== count($APELLIDO_DES) || count($NOMBRE_DES) !== count($ACTA_DES)) {
            throw new Exception("Los datos no coinciden en cantidad de elementos.");
        }

        $stmt = $this->PDO->prepare("INSERT INTO aprendices_destacados (acta_des, nombre_des, apellido_des) VALUES (:acta_des, :nombre_des, :apellido_des)");

        for ($i = 0; $i < count($NOMBRE_DES); $i++) {
            $stmt->bindValue(':acta_des', $ACTA_DES[$i]);
            $stmt->bindValue(':nombre_des', $NOMBRE_DES[$i]);
            $stmt->bindValue(':apellido_des', $APELLIDO_DES[$i]);
            $stmt->execute();
        }

        header("location:?c=vistas&a=ConsultarFicha");
        exit();
    } catch (Exception $e) {
        error_log("Error al insertar aprendices destacados: " . $e->getMessage());
        header("location:?c=vistas&a=ConsultarFicha&error=1");
        exit();
    }
}

public function insertarConclusiones($n_acta, $Aprendiz, $tipo_con, $documento_con, $medida, $descripcion_m, $cumplimiento, $c_contador, $n_ficha)
{
    try {
        $num_items = count($Aprendiz);

        // Verificar que todos los arreglos tengan la misma longitud
        $longitudes = [
            count($tipo_con), count($documento_con), count($medida), count($descripcion_m),
            count($cumplimiento), count($c_contador), count($n_ficha)
        ];

        if (count(array_unique(array_merge([$num_items], $longitudes))) > 1) {
            throw new Exception("❌ Los campos de conclusiones no tienen la misma cantidad de elementos.");
        }

        $query = "INSERT INTO conclusiones (
            c_contador, n_ficha, n_acta, Aprendiz, tipo_con, documento_con, medida, descripcion_m, cumplimiento
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->PDO->prepare($query);

        for ($i = 0; $i < $num_items; $i++) {

            // Validar campos obligatorios
            if (
                empty(trim($Aprendiz[$i])) ||
                empty(trim($tipo_con[$i])) || 
                empty(trim($documento_con[$i])) ||
                empty(trim($medida[$i])) ||
                empty(trim($n_ficha[$i]))
            ) {
                error_log("⚠️ Faltan datos obligatorios en la conclusión #" . ($i + 1));
                continue;
            }

            // Usar nombres de variables distintos para evitar sobrescribir los arrays
            $aprendiz      = trim(strip_tags($Aprendiz[$i]));
            $tipo_val      = trim(strip_tags($tipo_con[$i]));
            $documento_val = trim(strip_tags($documento_con[$i]));
            $medida_val    = trim(strip_tags($medida[$i]));
            $descripcion   = trim(strip_tags($descripcion_m[$i] ?? ''));
            $cumplim_val   = trim(strip_tags($cumplimiento[$i] ?? ''));
            $contador      = (int) ($c_contador[$i] ?? 0);
            $ficha         = (int) ($n_ficha[$i] ?? 0);
            $acta          = (int) $n_acta;

            $stmt->execute([
                $contador,
                $ficha,
                $acta,
                $aprendiz,
                $tipo_val,
                $documento_val,
                $medida_val,
                $descripcion,
                $cumplim_val
            ]);
        }

        return true;

    } catch (Exception $e) {
        error_log("❌ Error al insertar conclusiones: " . $e->getMessage());
        return false;
    }
}


public function insertarCasosAnteriores(){
    $usuario        = "root";
    $password       = "";
    $servidor       = "localhost";
    $basededatos    = "acta_completas";
    $con            = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
    $db             = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");
    
    $A_FICHA      = $_REQUEST['A_ficha'];
    $A_CONTADOR      = $_REQUEST['A_contador'];
    $A_ACTA      = $_REQUEST['A_acta'];
    $A_APRENDIZ       = $_REQUEST['A_aprendiz'];
    $A_MEDIDA    = $_REQUEST['A_medida'];
    $A_DESCRIPCION         = $_REQUEST['A_descripcion'];
    $A_CUMPLIMIENTO         = $_REQUEST['A_cumplimiento'];
    
    
    for ($i=0; $i < count($A_APRENDIZ); $i++){
    
    $InserData =("INSERT INTO  casos_anteriores (A_ficha,A_contador,A_acta,A_aprendiz,A_medida,A_descripcion,A_cumplimiento) VALUES ('".$A_FICHA[$i]."','".$A_CONTADOR[$i]."','".$A_ACTA[$i]."','".$A_APRENDIZ[$i]."','".$A_MEDIDA[$i]."','".$A_DESCRIPCION[$i]."','".$A_CUMPLIMIENTO[$i]."')");
    $resultadoInsertUser = mysqli_query($con, $InserData);
      
      }
    
      header("location:?c=vistas&a=ConsultarFicha");
}


public function Listarusu() {
    try {
        $consulta = $this->PDO->prepare("SELECT * FROM usuario;");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        error_log($e->getMessage()); // Registrar el error
        return []; // Retornar un array vacío en caso de error
    }
}


public function estados($id)
{
    try{ 
        
        $contador = $this->PDO->prepare("SELECT COUNT(Estado_forma) FROM aprendiz WHERE ficha =$id  AND Estado_forma='Cancelado';");
        $contador->execute(array($id));
        return $contador->fetch(PDO::FETCH_OBJ);
       

    }catch (Exception $e){
        die ($e->getMessage());
    }
}
public function listUnic($n_ficha) {
    try {
        $stm = $this->PDO->prepare("SELECT n_acta, ficha, fecha, acta_contador FROM acta WHERE ficha = ?");
        $stm->execute([$n_ficha]);

        $result = [];
        while ($row = $stm->fetch(PDO::FETCH_OBJ)) {
            $obj = new Acta();
            $obj->setN_acta($row->n_acta);
            $obj->setFicha($row->ficha);
            $obj->setFecha($row->fecha);
            $obj->setActa_contador($row->acta_contador);
            $result[] = $obj;
        }
        return $result;

    } catch (Exception $e) {
        die($e->getMessage());
    }
}


public function ListarPrograma(){
    try{
         $consulta=$this->PDO->prepare("SELECT * FROM programa;");
        $consulta->execute();
        return $consulta->fetchALL(PDO::FETCH_OBJ);
    }catch(Exception $e){
        die($e->getMessage());
    }

}

public function Listar($id){
    try{
         $consulta=$this->PDO->prepare("SELECT acta  from n_acta where  id = id ;");
        $consulta->execute();
        return $consulta->fetchALL(PDO::FETCH_OBJ);
    }catch(Exception $e){
        die($e->getMessage());
    }

}


public function ListarApre(){
    try{
         $consulta=$this->PDO->prepare("SELECT * FROM aprendiz;");
        $consulta->execute();
        return $consulta->fetchALL(PDO::FETCH_OBJ);
    }catch(Exception $e){
        die($e->getMessage());
    }

}




public function Listarinstrustor(){
    try{
         $consulta=$this->PDO->prepare("SELECT * FROM instructor;");
        $consulta->execute();
        return $consulta->fetchALL(PDO::FETCH_OBJ);
    }catch(Exception $e){
        die($e->getMessage());
    }

}


public function Listarfuncionario(){
    try{
         $consulta=$this->PDO->prepare("SELECT * FROM funcionario;");
        $consulta->execute();
        return $consulta->fetchALL(PDO::FETCH_OBJ);
    }catch(Exception $e){
        die($e->getMessage());
    }

}




public function ListarFicha(){
    try{
         $consulta=$this->PDO->prepare("SELECT * FROM ficha;");
        $consulta->execute();
        return $consulta->fetchALL(PDO::FETCH_OBJ);
    }catch(Exception $e){
        die($e->getMessage());
    }

}



public function Obtener($id) {
    try {
        $consulta = $this->PDO->prepare("SELECT * FROM acta WHERE n_acta = ?;");
        $consulta->execute(array($id));
        $r = $consulta->fetch(PDO::FETCH_OBJ);
        if ($r) {
            $p = new acta();
            $p->setN_acta($r->n_acta);
            // ... (resto de los setters)
            return $p;
        }
        return null; // Retornar null si no se encuentra el registro
    } catch (Exception $e) {
        error_log($e->getMessage()); // Registrar el error
        return null; // Retornar null en caso de error
    }
}

public function insertarCompromisos($n_acta) {
    try {
        // Verificar si los datos están presentes
        if (empty($_POST['actividad']) || empty($_POST['responsable'])) {
            throw new Exception("Los compromisos enviados son incompletos.");
        }

        // Iterar sobre las actividades y responsables recibidos
        foreach ($_POST['actividad'] as $index => $actividad) {
            $responsable = $_POST['responsable'][$index] ?? null;

            // Validar que ambos campos sean obligatorios
            if (empty($actividad) || empty($responsable)) {
                throw new Exception("Faltan datos en la fila {$index}. Actividad y responsable son obligatorios.");
            }

            // Insertar cada compromiso en la base de datos
            $query = "INSERT INTO compromisos (n_acta, actividad, responsable) VALUES (?, ?, ?)";
            $stmt = $this->PDO->prepare($query);
            $stmt->execute([$n_acta, $actividad, $responsable]);

            error_log("Compromiso insertado: Actividad={$actividad}, Responsable={$responsable}, Acta={$n_acta}");
        }
    } catch (Exception $e) {
        // Manejar errores
        throw new Exception("Error al insertar los compromisos: " . $e->getMessage());
    }
}


public function insertarParticipantes($n_acta) {
    try {
        // Validación de campos obligatorios
        if (empty($this->nombre)) {
            throw new Exception("El campo 'nombre' del participante es obligatorio.");
        }
        if (empty($this->cargo)) {
            throw new Exception("El campo 'cargo' del participante es obligatorio.");
        }
        if (empty($this->asistencia)) {
            throw new Exception("El campo 'asistencia' del participante es obligatorio.");
        }

        // Preparar consulta
        $query = "INSERT INTO participantes (nombre, cargo, asistencia, n_acta) VALUES (?, ?, ?, ?)";
        $stmt = $this->PDO->prepare($query);
        $stmt->execute([
            $this->nombre,
            $this->cargo,
            $this->asistencia,
            $n_acta
        ]);

        return $this; // Permite el encadenamiento o verificación

    } catch (Exception $e) {
        error_log("Error al insertar participante en acta $n_acta: " . $e->getMessage());
        throw new Exception("Error al insertar participante: " . $e->getMessage());
    }
}

public function insertarDesarrolloComite($n_acta)
{
    if (!isset($_POST['d_nombre_aprendiz'])) {
        return ['success' => false, 'message' => 'Error: Datos incompletos en el formulario.'];
    }

    $PDO = $this->PDO;

    $nombres = $_POST['d_nombre_aprendiz'];
    $descargos_its = $_POST['d_descargos_its'];
    $descargos_its_b = $_POST['d_descargos_its_b'];
    $descargos_its_c = $_POST['d_descargos_its_c'];
    $descargos_its_d = $_POST['d_descargos_its_d'];
    $descargos_aprendiz = $_POST['d_descargos_aprendiz'];
    $medida_formativa_comite = $_POST['medida_formativa_comite'];
    $inf_jefe_taller = $_POST['inf_jefe_taller'];
    $inf_instructores = $_POST['inf_instructores'];

    $numFilas = count($nombres);
    if (
        $numFilas !== count($descargos_its) || $numFilas !== count($descargos_its_b) ||
        $numFilas !== count($descargos_its_c) || $numFilas !== count($descargos_its_d) ||
        $numFilas !== count($descargos_aprendiz) || $numFilas !== count($medida_formativa_comite) ||
        $numFilas !== count($inf_jefe_taller) || $numFilas !== count($inf_instructores)
    ) {
        return ['success' => false, 'message' => 'Error: Los datos enviados no coinciden en tamaño.'];
    }

    // Obtener el último valor de d_acta para ese n_acta
    $sqlContador = "SELECT MAX(d_acta) AS max_d_acta FROM desarrollo_comite WHERE n_acta = ?";
    $stmtContador = $PDO->prepare($sqlContador);
    $stmtContador->execute([$n_acta]);
    $resultado = $stmtContador->fetch(PDO::FETCH_ASSOC);
    $ultimo_d_acta = $resultado['max_d_acta'] ?? 0;

    // Consulta de inserción
    $sql = "INSERT INTO desarrollo_comite 
            (n_acta, d_acta, d_nombre_aprendiz, d_descargos_its, d_descargos_its_b, d_descargos_its_c, d_descargos_its_d, d_descargos_aprendiz, medida_formativa_comite, inf_jefe_taller, inf_instructores) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $PDO->prepare($sql);

    try {
        for ($i = 0; $i < $numFilas; $i++) {
            if (trim($nombres[$i]) === '') {
                return ['success' => false, 'message' => 'Error: Datos incompletos en sección desarrollo comité en fila ' . ($i + 1)];
            }

            $d_acta = $ultimo_d_acta + $i + 1; // Incremental dentro de este n_acta

            $stmt->execute([
                $n_acta,
                $d_acta,
                $nombres[$i],
                $descargos_its[$i],
                $descargos_its_b[$i],
                $descargos_its_c[$i],
                $descargos_its_d[$i],
                $descargos_aprendiz[$i],
                $medida_formativa_comite[$i],
                $inf_jefe_taller[$i],
                $inf_instructores[$i]
            ]);
        }

        return ['success' => true];
    } catch (PDOException $e) {
        return ['success' => false, 'message' => 'Error SQL: ' . $e->getMessage()];
    }
}

public function insertar()
{
    try {
        $this->PDO->beginTransaction();

        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $obligatorios = ['acta_no', 'fecha', 'ficha', 'programa'];
        foreach ($obligatorios as $campo) {
            if (empty($post[$campo])) {
                throw new Exception("El campo obligatorio '$campo' está vacío.");
            }
        }

        $this->acta_no        = $post['acta_no'];
        $this->nom_rev        = $post['nom_rev'] ?? null;
        $this->ciudad         = $post['ciudad'] ?? null;
        $this->fecha          = $post['fecha'];
        $this->hora_in        = $post['hora_in'] ?? null;
        $this->hora_fin       = $post['hora_fin'] ?? null;
        $this->lu_en          = $post['lu_en'] ?? null;
        $this->direccion      = $post['direccion'] ?? null;
        $this->agenda         = $post['agenda'] ?? null;
        $this->objetivos      = $post['objetivos'] ?? null;
        $this->inf_ficha      = $post['inf_ficha'] ?? null;
        $this->hechos_actuales = $post['hechos_actuales'] ?? null;
        $this->informe_vocero = $post['informe_vocero'] ?? null;
        $this->informe_subvocero = $post['informe_subvocero'] ?? null;
        $this->ficha          = $post['ficha'];
        $this->programa       = $post['programa'];
        $this->privacidad     = $post['privacidad'] ?? null;

        // ✅ Calcular correctamente acta_contador según número de ficha
        $stmt = $this->PDO->prepare("SELECT COUNT(*) FROM acta WHERE ficha = ?");
        $stmt->execute([$this->ficha]);
        $contadorActual = (int) $stmt->fetchColumn();
        $this->acta_contador = $contadorActual + 1;

        // Insertar ACTA
        $stmt = $this->PDO->prepare("INSERT INTO acta (
            acta_no, acta_contador, nom_rev, ciudad, fecha, hora_in, hora_fin, lu_en, direccion, agenda, 
            objetivos, inf_ficha, hechos_actuales, informe_vocero, informe_subvocero, ficha, programa, privacidad
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->execute([
            $this->acta_no, $this->acta_contador, $this->nom_rev, $this->ciudad, $this->fecha,
            $this->hora_in, $this->hora_fin, $this->lu_en, $this->direccion, $this->agenda,
            $this->objetivos, $this->inf_ficha, $this->hechos_actuales, $this->informe_vocero, $this->informe_subvocero, $this->ficha,
            $this->programa, $this->privacidad
        ]);

        $this->n_acta = $this->PDO->lastInsertId();

        // PARTICIPANTES
        if (!empty($post['nombre'])) {
            foreach ($post['nombre'] as $i => $nombre) {
                if (
                    empty(trim($nombre)) ||
                    empty(trim($post['cargo'][$i] ?? '')) ||
                    empty(trim($post['asistencia'][$i] ?? ''))
                ) {
                    throw new Exception("Participante incompleto en fila" . ($i + 1));
                }

                $this->nombre     = $nombre;
                $this->cargo      = $post['cargo'][$i];
                $this->asistencia = $post['asistencia'][$i];
                $this->insertarParticipantes($this->n_acta);
            }
        }

        // COMPROMISOS
        if (!empty($post['actividad']) && !empty($post['responsable'])) {
            $this->insertarCompromisos($this->n_acta);
        }

        // DESARROLLO COMITÉ
        $resDesarrollo = $this->insertarDesarrolloComite($this->n_acta);
        if (!$resDesarrollo['success']) {
            throw new Exception($resDesarrollo['message']);
        }

        // CONCLUSIONES
        $Aprendiz       = $post['Aprendiz'] ?? [];
        $tipo_con       = $post['tipo_con'] ?? [];
        $documento_con  = $post['documento_con'] ?? [];
        $medida         = $post['medida'] ?? [];
        $descripcion_m  = $post['descripcion_m'] ?? [];
        $cumplimiento   = $post['cumplimiento'] ?? [];
        $c_contador     = $post['c_contador'] ?? [];
        $n_ficha        = $post['n_ficha'] ?? [];

        $this->insertarConclusiones(
            $this->n_acta,
            $Aprendiz,
            $tipo_con,
            $documento_con,
            $medida,
            $descripcion_m,
            $cumplimiento,
            $c_contador,
            $n_ficha
        );

        // CASOS ESPECIALES
        $campos_especiales = ['nombre_aprendiz', 'tipo', 'documento', 'nombre_its', 'description', 'falta', 'reglamento', 'cla_falta'];
        $arrays = [];

        foreach ($campos_especiales as $campo) {
            $arrays[$campo] = $post[$campo] ?? [];
        }

        $cant_filas = count($arrays['nombre_aprendiz']);
        $longitudes_validas = array_reduce($arrays, fn($carry, $arr) => $carry && (count($arr) === $cant_filas), true);

        if ($longitudes_validas && $cant_filas > 0) {
            $this->insertarCasosEspeciales(
                $arrays['nombre_aprendiz'],
                $arrays['tipo'],
                $arrays['documento'],
                $arrays['nombre_its'],
                $arrays['description'],
                $arrays['falta'],
                $arrays['reglamento'],
                $arrays['cla_falta']
            );
        } else {
            error_log("⚠️ Datos incompletos o mal formateados en casos especiales.");
        }

        $this->PDO->commit();

        echo json_encode([
            'success' => true,
            'message' => 'Acta registrada con éxito.',
            'n_acta' => $this->n_acta,
            'ficha' => $this->ficha,
            'acta_contador' => $this->acta_contador
        ]);
        
        
        exit;

    } catch (Exception $e) {
        $this->PDO->rollBack();
        error_log("❌ Error al guardar acta: " . $e->getMessage());
        echo json_encode([
            "success" => false,
            "message" => "Error: " . $e->getMessage()
        ]);
        exit;
    }
}


public function Eliminar($id) {
    try {
        $consulta = "DELETE FROM acta WHERE n_acta = ?;";
        $this->PDO->prepare($consulta)->execute(array($id));
    } catch (Exception $e) {
        error_log($e->getMessage()); // Registrar el error
    }
}

public function ListarActas(){
    try{
         $consulta=$this->PDO->prepare("SELECT * FROM acta;");
        $consulta->execute();
        return $consulta->fetchALL(PDO::FETCH_OBJ);
    }catch(Exception $e){
        die($e->getMessage());
    }

}



public function Obtenercontenido($id)
{
    try {
        // Preparar y ejecutar la consulta
        $consulta = $this->PDO->prepare("SELECT * FROM ficha WHERE id_ficha = ?;");
        $consulta->execute([$id]);
        $r = $consulta->fetch(PDO::FETCH_OBJ);

        if ($r) { // Verificar si se encontraron resultados
            $p = new ficha();
            $p->setId_ficha($r->id_ficha);
            $p->setN_ficha($r->N_ficha);
            $p->setCantidad_apre($r->cantidad_apre);
            $p->setPrograma($r->programa);
            $p->setJornada($r->jornada);
            $p->setTipo_forma($r->tipo_forma);
            $p->setFecha_inicio($r->fecha_inicio);
            $p->setFecha_fin($r->fecha_fin);

            return $p;
        } else {
            // Manejo en caso de que no se encuentren resultados
            throw new Exception("No se encontraron datos para la ficha con ID: " . htmlspecialchars($id));
        }
    } catch (Exception $e) {
        // Registrar el error (opcional)
        error_log("Error en Obtenercontenido: " . $e->getMessage());
        return null; // Retornar un valor nulo en caso de error
    }
}




public function ObtenerParticipantes($ficha){

 

    try{ 
        
        $query = $this->PDO->prepare("SELECT * FROM participantes where  n_acta = $ficha");
        $query->execute(array($ficha));
        return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);
    }catch (Exception $e){
        die ($e->getMessage());
    }
}

public function ObtenerCompromisos($n_acta)
{
    try {
        // Preparar la consulta para obtener los compromisos relacionados con un acta
        $query = $this->PDO->prepare("SELECT * FROM compromisos WHERE n_acta = ?");
        $query->execute(array($n_acta));
        
        // Retornar los resultados como una lista de objetos de la clase actual
        return $query->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    } catch (Exception $e) {
        // Manejar errores y mostrar mensaje claro
        die("Error al obtener los compromisos: " . $e->getMessage());
    }
}


public function ObtenerRarr($ficha){
    try{ 
        
        $query = $this->PDO->prepare("SELECT * FROM upload where acta_rar = $ficha");
        $query->execute(array($ficha));
        return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);
    }catch (Exception $e){
        die ($e->getMessage());
    }
}

public function ObtenerCasosP($ficha){
    try{ 
        
        $query = $this->PDO->prepare("SELECT * FROM casos_especiales where C_acta = $ficha");
        $query->execute(array($ficha));
        return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);
    }catch (Exception $e){
        die ($e->getMessage());
    }
}

public function obtenercontador($ficha)
{
    try { 
        $sql = "SELECT acta_contador FROM acta WHERE ficha = ? ORDER BY n_acta DESC LIMIT 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute([$ficha]);
        $resultado = $stmt->fetch(PDO::FETCH_OBJ);

        return $resultado ? $resultado->acta_contador : 0; // Retorna 0 si no hay registros

    } catch (Exception $e) {
        die("Error al obtener el contador: " . $e->getMessage());
    }
}

public function obtenercontadors($id)
{
    try{ 
        $contador=0;
        $contador = $this->PDO->prepare("SELECT acta_contador FROM acta WHERE ficha= $id ORDER BY n_acta DESC LIMIT 1;");
        $contador->execute(array($id));
        return $contador->fetch(PDO::FETCH_OBJ);

    }catch (Exception $e){
        die ($e->getMessage());
    }
}

public function obtenerActaAnterior($ficha, $acta_contador) {
    try {
        error_log("Buscando el acta anterior con ficha=$ficha y acta_contador=$acta_contador-1");

        $stmt = $this->PDO->prepare("SELECT n_acta FROM acta WHERE ficha = ? AND acta_contador = ?");
        $stmt->execute([$ficha, $acta_contador - 1]);

        return $stmt->fetch(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        error_log("Error en obtenerActaAnterior: " . $e->getMessage());
        return null;
    }
}

public function obtenerConclusionesAnt($ficha) {
    try {
        error_log("Buscando conclusiones anteriores para ficha=$ficha, con c_contador >= 1");

        $stmt = $this->PDO->prepare("
            SELECT n_ficha, n_acta, Aprendiz, tipo_con, documento_con, medida, descripcion_m, cumplimiento
            FROM conclusiones
            WHERE n_ficha = ? AND c_contador IN (1, 2, 3)
            ORDER BY c_contador DESC
        ");
        $stmt->execute([$ficha]);

        $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);

        if (empty($resultado)) {
            error_log("No se encontraron registros en conclusiones para ficha: $ficha con c_contador válido.");
        }

        return $resultado;
    } catch (Exception $e) {
        error_log("Error en obtenerConclusiones: " . $e->getMessage());
        return [];
    }
}


public function ObtenerDestacados($ficha){
    try{ 
        
        $query = $this->PDO->prepare("SELECT * FROM aprendices_destacados where  acta_des = $ficha");
        $query->execute(array($ficha));
        return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);
    }catch (Exception $e){
        die ($e->getMessage());
    }
}
public function obtenerActa($ficha, $acta_contador) {
    try { 
        $query = $this->PDO->prepare("SELECT * FROM acta WHERE ficha = ? AND acta_contador = ?");
        $query->execute(array($ficha, $acta_contador));
        return $query->fetch(PDO::FETCH_OBJ); // Retorna un solo acta como objeto
    } catch (Exception $e) {
        die($e->getMessage());
    }
}


public function ObtenerDesarrolloComite($ficha) {
    try { 
        // Validar que $ficha sea un número entero
        if (!is_numeric($ficha) || intval($ficha) <= 0) {
            throw new Exception("El valor de 'ficha' no es válido: " . htmlspecialchars($ficha));
        }

        // Preparar consulta con marcador de posición
        $query = $this->PDO->prepare("SELECT * FROM desarrollo_comite WHERE d_acta = :ficha");

        // Ejecutar consulta con el valor de ficha
        $query->execute([':ficha' => intval($ficha)]);

        // Devolver los datos como array asociativo
        return $query->fetchAll(PDO::FETCH_ASSOC) ?: [];

    } catch (Exception $e) {
        die("Error en ObtenerDesarrolloComite: " . $e->getMessage());
    }
}

public function obtenerVerificacion($ficha) {
    error_log("BUSCANDO acta anterior con ficha=$ficha");
    $stmt = $this->PDO->prepare("
        SELECT n_acta, fecha, nom_rev, ficha, programa
        FROM acta
        WHERE ficha = ?
        ORDER BY acta_contador DESC
        LIMIT 1
    ");
    $stmt->execute([$ficha]);
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    if (!$result) {
        error_log("NO SE ENCONTRÓ: ficha=$ficha");
    }
    return $result;
}


public function ObtenerCont($ficha){

 

    $consulta=$this->PDO->prepare("SELECT COUNT(acta_contador) AS cont FROM acta WHERE ficha = $ficha");
    $consulta->execute();
     return $consulta->fetch(PDO :: FETCH_OBJ);

}

public function ObtenerConclusiones($ficha){
    try{ 
        
        $query = $this->PDO->prepare("SELECT * FROM conclusiones where q_acta = $ficha");
        $query->execute(array($ficha));
        return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);
    }catch (Exception $e){
        die ($e->getMessage());
    }
}
public function ObtenerPrueba($ficha){
    try{ 
        
        $query = $this->PDO->prepare("SELECT * FROM casos_anteriores where  A_acta = $ficha");
        $query->execute(array($ficha));
        return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);
    }catch (Exception $e){
        die ($e->getMessage());
    }
}
 
public function ObtenerCancelado($ficha){

    $consulta=$this->PDO->prepare("SELECT COUNT(Estado) as Cancelado FROM aprendiz WHERE ficha = $ficha  AND Estado='CANCELADO'");
    $consulta->execute();
     return $consulta->fetch(PDO :: FETCH_OBJ);
}

public function ObtenerTrasladado($ficha){

$consulta=$this->PDO->prepare("SELECT COUNT(Estado) as Trasladado FROM aprendiz WHERE ficha = $ficha  AND Estado='CANCELADO'");
$consulta->execute();
 return $consulta->fetch(PDO :: FETCH_OBJ);
}

public function ObtenerFormacion($ficha){

    $consulta=$this->PDO->prepare("SELECT COUNT(Estado) as Formacion FROM aprendiz WHERE ficha = $ficha  AND Estado='EN FORMACIÓN'");
    $consulta->execute();
     return $consulta->fetch(PDO :: FETCH_OBJ);

}

public function ObtenerRetiro($ficha){
    $consulta=$this->PDO->prepare("SELECT COUNT(Estado) as Retiro FROM aprendiz WHERE ficha = $ficha  AND Estado='RETIRO VOLUNTARIO'");
    $consulta->execute();
     return $consulta->fetch(PDO :: FETCH_OBJ);
}

public function ObtenerCondicionado($ficha){
$consulta=$this->PDO->prepare("SELECT COUNT(Estado) as Condicionado FROM aprendiz WHERE ficha = $ficha  AND Estado='CONDICIONADO'");
$consulta->execute();
 return $consulta->fetch(PDO :: FETCH_OBJ);
}

public function ObtenerAplazado($ficha){
$consulta=$this->PDO->prepare("SELECT COUNT(Estado) as Aplazado FROM aprendiz WHERE ficha = $ficha  AND Estado='APLAZADO'");
$consulta->execute();
 return $consulta->fetch(PDO :: FETCH_OBJ);
}

public function ObtenerInformeVocero($ficha) {
    try {
        $consulta = $this->PDO->prepare("SELECT * FROM informe_vocero WHERE ficha = :ficha");
        $consulta->bindParam(':ficha', $ficha, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

public function ObtenerInformeSubvocero($ficha) {
    try {
        $consulta = $this->PDO->prepare("SELECT * FROM informe_subvocero WHERE ficha = :ficha");
        $consulta->bindParam(':ficha', $ficha, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

public function setHechos_actuales($hechos_actuales) {
    $this->hechos_actuales = $hechos_actuales;
}

public function getHechos_actuales() {
    return $this->hechos_actuales;
}

public function getActa_no()
{
    return $this->acta_no;
}

public function setActa_no($acta_no)
{
    $this->acta_no = $acta_no;

    return $this;
}
public function getActa_contador()
{
    return $this->acta_contador;
}

public function setActa_contador($acta_contador)
{
    $this->acta_contador = $acta_contador;

    return $this;
}

public function getN_acta()
{
    return $this->n_acta;
}

public function setN_acta($n_acta)
{
    $this->n_acta = $n_acta;

    return $this;
}


public function getNom_rev()
{
    return $this->nom_rev;
}

public function setNom_rev($nom_rev)
{
    $this->nom_rev = $nom_rev;

    return $this;
}
public function getPrivacidad()
{
    return $this->privacidad;
}

public function setPrivacidad($privacidad)
{
    $this->privacidad = $privacidad;

    return $this;
}


public function getCiudad()
{
    return $this->ciudad;
}

public function setCiudad($ciudad)
{
    $this->ciudad = $ciudad;

    return $this;
}


public function getFecha()
{
    return $this->fecha;
}

public function setFecha($fecha)
{
    $this->fecha = $fecha;

    return $this;
}



public function getHora_in()
{
    return $this->hora_in;
}

public function setHora_in($hora_in)
{
    $this->hora_in = $hora_in;

    return $this;
}


public function getHora_fin()
{
    return $this->hora_fin;
}

public function setHora_fin($hora_fin)
{
    $this->hora_fin = $hora_fin;

    return $this;
}


public function getLu_en()
{
    return $this->lu_en;
}

public function setLu_en($lu_en)
{
    $this->lu_en = $lu_en;

    return $this;
}


public function getDireccion()
{
    return $this->direccion;
}

public function setDireccion($direccion)
{
    $this->direccion = $direccion;

    return $this;
}


public function getAgenda()
{
    return $this->agenda;
}

public function setAgenda($agenda)
{
    $this->agenda = $agenda;

    return $this;
}

public function getObjetivos()
{
    return $this->objetivos;
}

public function setObjetivos($objetivos)
{
    $this->objetivos = $objetivos;

    return $this;
}


public function getParticipantes()
{
    return $this->participantes;
}


public function setParticipantes($participantes)
{
    $this->participantes = $participantes;

    return $this;
}

public function getCompromisos()
{
    return $this->compromisos;
}


public function setCompromisos($compromisos)
{
    $this->compromisos = $compromisos;

    return $this;
}


public function getInf_ficha()
{
    return $this->inf_ficha;
}


public function setInf_ficha($inf_ficha)
{
    $this-> inf_ficha = $inf_ficha;

    return $this;
}



public function getCasos_ant()
{
    return $this->casos_ant;
}


public function setCasos_ant($casos_ant)
{
    $this-> casos_ant = $casos_ant;

    return $this;
}


public function getCasos_part()
{
    return $this->casos_part;
}


public function setCasos_part($casos_part)
{
    $this-> casos_part = $casos_part;

    return $this;
}

public function getDesarrollo_comite()
{
    return $this->desarrollo_comite;
}


public function setDesarrollo_comite($desarrollo_comite)
{
    $this-> desarrollo_comite = $desarrollo_comite;

    return $this;
}

public function getInforme_vocero()
{
    return $this->informe_vocero;
}


public function setInforme_vocero($informe_vocero)
{
    $this-> informe_vocero = $informe_vocero;

    return $this;
}

public function getInforme_subvocero()
{
    return $this->informe_subvocero;
}


public function setInforme_subvocero($informe_subvocero)
{
    $this-> informe_subvocero = $informe_subvocero;

    return $this;
}

public function getConclusiones()
{
    return $this->conclusiones;
}

public function setConclusiones($conclusiones)
{
    $this->conclusiones = $conclusiones;

    return $this;
}

public function getFicha()
{
    return $this->ficha;
}

public function setFicha($ficha)
{
    $this->ficha = $ficha;

    return $this;
}

public function getPrograma()
{
    return $this->programa;
}

public function setPrograma($programa)
{
    $this->programa = $programa;

    return $this;
}






public function getNombre()
{
    return $this->nombre;                            
}

public function setNombre($nombre)
{
    $this->nombre = $nombre;

    return $this;
}


public function getApellido()
{
    return $this->apellido;
}

public function setApellido($apellido)
{
    $this->apellido = $apellido;

    return $this;
}


public function getCargo()
{
    return $this->cargo;
}

public function setCargo($cargo)
{
    $this->cargo = $cargo;

    return $this;
}



public function getAsistencia()
{
    return $this->asistencia;
}

public function setAsistencia($asistencia)
{
    $this->asistencia = $asistencia;

    return $this;
}




/*casos*/

public function getC_ficha()
{
    return $this->C_ficha;
}

public function setC_ficha($C_ficha)
{
    $this->C_ficha = $C_ficha;

    return $this;
}


public function getC_acta()
{
    return $this->C_acta;
}

public function setC_acta($C_acta)
{
    $this->C_acta = $C_acta;

    return $this;
}


public function getNombre_aprendiz()
{
    return $this->nombre_aprendiz;
}

public function setNombre_aprendiz($nombre_aprendiz)
{
    $this->nombre_aprendiz = $nombre_aprendiz;

    return $this;
}

public function getTipo()
{
    return $this->tipo;
}

public function setTipo($tipo)
{
    $this->tipo = $tipo;

    return $this;
}

public function getDocumento()
{
    return $this->documento;
}

public function setDocumento($documento)
{
    $this->documento = $documento;

    return $this;
}

public function getC_contador()
{
    return $this->c_contador;
}

public function setC_contador($c_contador)
{
    $this->c_contador = $c_contador;

    return $this;
}

public function getTipo_con()
{
    return $this->tipo_con;
}

public function setTipo_con($tipo_con)
{
    $this->tipo_con = $tipo_con;

    return $this;
}

public function getDocumento_con()
{
    return $this->documento_con;
}

public function setDocumento_con($documento_con)
{
    $this->documento_con = $documento_con;

    return $this;
}


public function getNombre_its()
{
    return $this->nombre_its;
}

public function setNombre_its($nombre_its)
{
    $this->nombre_its = $nombre_its;

    return $this;
}


public function getDescription()
{
    return $this->description;
}

public function setDescription($description)
{
    $this->description = $description;

    return $this;
}

public function getFalta()
{
    return $this->falta;
}

public function setFalta($falta)
{
    $this->falta = $falta;

    return $this;
}

public function getReglamento()
{
    return $this->reglamento;
}

public function setReglamento($reglamento)
{
    $this->reglamento = $reglamento;

    return $this;
}

public function getCla_falta()
{
    return $this->cla_falta;
}

public function setCla_falta($cla_falta)
{
    $this->cla_falta = $cla_falta;

    return $this;
}

public function getNf_ficha()
{
    return $this->n_ficha;
}

public function setNf_ficha($n_ficha)
{
    $this->n_ficha = $n_ficha;

    return $this;
}


public function getQ_acta()
{
    return $this->Q_acta;
}

public function setQ_acta($Q_acta)
{
    $this->Q_acta = $Q_acta;

    return $this;
}


public function getAprendiz()
{
    return $this->Aprendiz;
}

public function setAprendiz($Aprendiz)
{
    $this->Aprendiz = $Aprendiz;

    return $this;
}

public function getMedida()
{
    return $this->medida;
}

public function setMedida($medida)
{
    $this->medida = $medida;

    return $this;
}




public function getDescripcion_m()
{
    return $this->descripcion_m;
}

public function setDescricion_m($descripcion_m)
{
    $this->descripcion_m = $descripcion_m;

    return $this;
}


public function getCumplimiento()
{
    return $this->cumplimiento;
}

public function setCumplimiento($cumplimiento)
{
    $this->cumplimiento = $cumplimiento;

    return $this;
}


/*anteriores*/
public function getId_a()
{
    return $this->id;
}

public function setId_a($id)
{
    $this->id = $id;

    return $this;
}


public function getA_ficha()
{
    return $this->A_ficha;
}

public function setA_ficha($A_ficha)
{
    $this->A_ficha = $A_ficha;

    return $this;
}


public function getA_acta()
{
    return $this->A_acta;
}

public function setA_acta($A_acta)
{
    $this->A_acta = $A_acta;

    return $this;
}


public function getAAprendiz()
{
    return $this->A_aprendiz;
}

public function setAAprendiz($A_aprendiz)
{
    $this->A_aprendiz = $A_aprendiz;

    return $this;
}



public function getA_instructor()
{
    return $this->A_instructor;
}

public function setA_instructor($A_instructor)
{
    $this->A_instructor = $A_instructor;

    return $this;
}


public function getA_descripcion()
{
    return $this->A_descripcion;
}

public function setA_descricion($A_descripcion)
{
    $this->A_descripcion = $A_descripcion;

    return $this;
}


public function getA_cumplimiento()
{
    return $this->A_cumplimiento;
}

public function setA_cumplimiento($A_cumplimiento)
{
    $this->A_cumplimiento = $A_cumplimiento;

    return $this;
}

/*Destacados*/
public function getId_destacados()
{
    return $this->id_destacados;
}

public function setId_destacados($id_destacados)
{
    $this->id_destacados = $id_destacados;

    return $this;
}


public function getActa_des()
{
    return $this->acta_des;
}

public function setActa_des($acta_des)
{
    $this->acta_des = $acta_des;

    return $this;
}


public function getNombre_des()
{
    return $this->nombre_des;
}

public function setNombre_des($nombre_des)
{
    $this->nombre_des = $nombre_des;

    return $this;
}

public function getApellido_des()
{
    return $this->apellido_des;
}

public function setApellido_des($apellido_des)
{
    $this->apellido_des = $apellido_des;

    return $this;
}
/*comite*/
public function getId_desarrollo()
{
    return $this->id_desarrollo;
}

public function setId_desarollo($id_desarrollo)
{
    $this->id_desarrollo = $id_desarrollo;

    return $this;
}


public function getD_acta()
{
    return $this->d_acta;
}

public function setD_acta($d_acta)
{
    $this->d_acta = $d_acta;

    return $this;
}


public function getD_nombre_aprendiz()
{
    return $this->d_nombre_aprendiz;
}

public function setD_nombre_aprendiz($d_nombre_aprendiz)
{
    $this->d_nombre_aprendiz = $d_nombre_aprendiz;

    return $this;
}

public function getD_descargos_its()
{
    return $this->d_descargos_its;
}

public function setD_descargos_its($d_descargos_its)
{
    $this->d_descargos_its = $d_descargos_its;

    return $this;
}

public function getD_descargos_its_b()
{
    return $this->d_descargos_its_b;
}

public function setD_descargos_its_b($d_descargos_its_b)
{
    $this->d_descargos_its_b = $d_descargos_its_b;

    return $this;
}

public function getD_descargos_its_c()
{
    return $this->d_descargos_its_c;
}

public function setD_descargos_its_c($d_descargos_its_c)
{
    $this->d_descargos_its_c = $d_descargos_its_c;

    return $this;
}

public function getD_descargos_aprendiz()
{
    return $this->d_descargos_aprendiz;
}

public function setD_descargos_aprendiz($d_descargos_aprendiz)
{
    $this->d_descargos_aprendiz = $d_descargos_aprendiz;

    return $this;
}

public function getMedida_formativa_comite()
{
    return $this->medida_formativa_comite;
}

public function setMedida_formativa_comite($medida_formativa_comite)
{
    $this->medida_formativa_comite = $medida_formativa_comite;

    return $this;
}

public function getInf_jefe_taller()
{
    return $this->inf_jefe_taller;
}

public function setInf_jefe_taller($inf_jefe_taller)
{
    $this->inf_jefe_taller = $inf_jefe_taller;

    return $this;
}

public function getInf_instructores()
{
    return $this->inf_instructores;
}

public function setInf_instructores($inf_instructores)
{
    $this->inf_instructores = $inf_instructores;

    return $this;
}
/*rar*/
public function getId_rar()
{
    return $this->id;
}

public function setId_rar($id)
{
    $this->id = $id;

    return $this;
}


public function getActa_rar()
{
    return $this->acta_rar;
}

public function setActa_rar($acta_rar)
{
    $this->acta_rar = $acta_rar;

    return $this;
}


public function getFicha_rar()
{
    return $this->ficha_rar;
}

public function setFicha_rar($ficha_rar)
{
    $this->ficha_rar = $ficha_rar;

    return $this;
}


public function getFname()
{
    return $this->fname;
}

public function setFname($fname)
{
    $this->fname = $fname;

    return $this;
}


public function getName()
{
    return $this->name;
}

public function setName($name)
{
    $this->name = $name;

    return $this;
}


}