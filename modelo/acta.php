<?php

require_once "modelo/ficha.php";
require_once "modelo/acta.php";

class acta{

    private $contador = null;


    private   $e=null;

private   $n_acta=null;
private   $acta_no=null;
private  $acta_contador =null;
private  $nom_rev =null;
private   $ciudad =null;
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
private  $hechos_actuales =null ;
private  $desarrollo =null ;
private  $informe_vocero =null ;
private  $conclusion=null;
private  $ficha =null ;
private  $programa =null;
private  $privacidad =null;


private $PDO;
public function __CONSTRUCT(){
    $this->PDO = BaseDeDatos::conectar();

}

public function Actualizar(acta $acta){
    try{
        $consulta="UPDATE acta SET
            nom_rev=?,
            ciudad=?,
            fecha=?,
            ficha=?,
            programa=?,
            hora_in=?,
            hora_fin=?,
            lu_en=?,
            direccion=?,
            agenda=?,
            objetivos=?,
            participantes=?,
            inf_ficha=?,
            casos_ant=?,
            casos_part=?,
            hechos_actuales=?,
            desarrollo=?,
            informe_vocero=?,
            conclusion=?
            WHERE n_acta=?;
        ";
        $this->PDO->prepare($consulta)
                ->execute(array(
                     $acta->getNom_rev(),
                     $acta->getCiudad(),
                     $acta->getFecha(),
                     $acta->getFicha(),
                     $acta->getPrograma(),
                     $acta->getHora_in(),
                     $acta->getHora_fin(),
                     $acta->getLu_en(),
                     $acta->getDireccion(),
                     $acta->getAgenda(),
                     $acta->getObjetivos(),
                     $acta->getParticipantes(),
                     $acta->getInf_ficha(),
                     $acta->getCasos_ant(),
                     $acta->getCasos_part(),
                     $acta->getHechos_actuales(),
                     $acta->getDesarrollo(),
                     $acta->getInforme_vocero(),
                     $acta->getConclusion(),
                     $acta->getN_acta()


                ));
    }catch(Exception$e){
   
         header("location:?c=vistas&a=ConsultarFicha");
    }

}



/*inicio prueba*/
public function insertarparti(){
    $host = 'localhost';
    $basededatos = 'acta_completas';
    $usuario = 'root';
    $contraseña = '';
    
    
    
    $conexion = new mysqli($host, $usuario,$contraseña, $basededatos);
    if ($conexion -> connect_errno) {
    die( "Fallo la conexión : (" . $conexion -> mysqli_connect_errno() 
    . ") " . $conexion -> mysqli_connect_error());
    }
      ///////////////////CONSULTA DE LOS ALUMNOS///////////////////////
    
    
            if(isset($_POST['insertar']))
            {
            $items0=($_POST['n_acta']);
            $items1=($_POST['nombre']);
            $items2=($_POST['cargo']);
            $items3=($_POST['asistencia']);
            
            while(true){
            
            $item0 = current($items0);  
            $item1 = current($items1);
            $item2 = current($items2);
            $item3 = current($items3);
            ////// ASIGNARLOSAVARIABLES ////
            $n_acta=(( $item0 !== false) ? $item0 :",&nbsp;");
            $nombre=(( $item1 !== false) ? $item1 :",&nbsp;");
            $cargo=(( $item2 !== false) ? $item2 : ",&nbsp;");
            $asistencia=(( $item3 !== false) ? $item3 : ",&nbsp;");
            
            //$valores= '('.$nombre.',"'.$apellido.'","'.$cargo.'","'.$asistencia.'"),';
            $valores= "('$n_acta','$nombre','$cargo','$asistencia'),";
            
            $valoresQ =substr($valores,0,-1);
            ///////// QUERY DE INSERCIÓN /////
            
            $query = "INSERT INTO participantes (n_acta,nombre,cargo,asistencia) VALUES $valoresQ ";
            $sqlRes=$conexion->query($query) ;
            
                                    $item0 = next( $items0 );
                                    $item1 = next( $items1 );
                                    $item2= next($items2);
                                    $item3 = next($items3);
            
            //$this->envioMail();
            // $this->envioMail($Correo_Electronico,$Contrasena_participantes$participantes$participantes);
            if($item0 === false && $item1 === false && $item2 === false && $item3 === false)break;
            
            //$this->envioMail();
            // $this->envioMail($Correo_Electronico,$Contrasena_participantes$participantes$participantes);
            }
            if ($query) {
             header("location:../?c=vistas&a=Particulares");
            }

            /*prueba2*/
            
            /*fin prueba2*/
            }
    

}
public function insertCasosEspeciales(){
    
      $usuario        = "root";
      $password       = "";
      $servidor       = "localhost";
      $basededatos    = "acta_completas";
      $con            = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
      $db             = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");
      

      $C_FICHA      = $_REQUEST['C_ficha'];
      $C_ACTA      = $_REQUEST['C_acta'];
      $C_APRENDIZ       = $_REQUEST['nombre_aprendiz'];
      $C_INSTRUCTOR    = $_REQUEST['nombre_its'];
      $C_DESCRIPCION         = $_REQUEST['description'];
      $C_FALTA         = $_REQUEST['falta'];
      $C_REGLAMENTO         = $_REQUEST['reglamento'];
      $C_REGLAMENTO_A         = $_REQUEST['reglamento_a'];
      $C_REGLAMENTO_B         = $_REQUEST['reglamento_b'];
      $C_REGLAMENTO_C         = $_REQUEST['reglamento_c'];
      
      
      /*function codAleatorio($length = 5) {
          return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
      }
      $CODE_REFERENCIA  = codAleatorio();*/
      
      
      for ($i=0; $i < count($C_APRENDIZ); $i++){
      
      $InserData =("INSERT INTO casos_especiales (C_ficha, C_acta, nombre_aprendiz,nombre_its,description,falta,reglamento,reglamento_a,reglamento_b,reglamento_c) VALUES ('".$C_FICHA[$i]."','".$C_ACTA[$i]."','".$C_APRENDIZ[$i]."','".$C_INSTRUCTOR[$i]."','".$C_DESCRIPCION[$i]."','".$C_FALTA[$i]."','".$C_REGLAMENTO[$i]."','".$C_REGLAMENTO_A[$i]."','".$C_REGLAMENTO_B[$i]."','".$C_REGLAMENTO_C[$i]."')");
      $resultadoInsertUser = mysqli_query($con, $InserData);
        
        }
      
        header("location:?c=vistas&a=ConsultarFicha");
    
    }

    public function insertarAprendicesDestacados(){
        $usuario        = "root";
        $password       = "";
        $servidor       = "localhost";
        $basededatos    = "acta_completas";
        $con            = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
        $db             = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");
        

        $ACTA_DES      = $_REQUEST['acta_des'];
        $NOMBRE_DES       = $_REQUEST['nombre_des'];
        $APELLIDO_DES    = $_REQUEST['apellido_des'];
      
        
        
        /*function codAleatorio($length = 5) {
            return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
        }
        $CODE_REFERENCIA  = codAleatorio();*/
        
        
        for ($i=0; $i < count($NOMBRE_DES); $i++){
        
        $InserData =("INSERT INTO aprendices_destacados (acta_des,nombre_des,apellido_des) VALUES ('".$ACTA_DES[$i]."','".$NOMBRE_DES[$i]."','".$APELLIDO_DES[$i]."')");
        $resultadoInsertUser = mysqli_query($con, $InserData);
          
          }
        
          header("location:?c=vistas&a=ConsultarFicha");
    }

public function insertarConclusiones(){
    $usuario        = "root";
    $password       = "";
    $servidor       = "localhost";
    $basededatos    = "acta_completas";
    $con            = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
    $db             = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");
    
    $C_CONTADOR      = $_REQUEST['c_contador'];
    $FICHA      = $_REQUEST['n_ficha'];
    $N_ACTA      = $_REQUEST['q_acta'];
    $APRENDIZ       = $_REQUEST['Aprendiz'];
    $MEDIDA    = $_REQUEST['medida'];
    $DESCRIPCION_M         = $_REQUEST['descripcion_m'];
    $CUMPLIMIENTO         = $_REQUEST['cumplimiento'];
    
    
    /*function codAleatorio($length = 5) {
        return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
    $CODE_REFERENCIA  = codAleatorio();*/
    
    
    for ($i=0; $i < count($APRENDIZ); $i++){
    
    $InserData =("INSERT INTO conclusiones (c_contador,n_ficha, q_acta, Aprendiz,medida,descripcion_m,cumplimiento) VALUES ('".$C_CONTADOR[$i]."','".$FICHA[$i]."','".$N_ACTA[$i]."','".$APRENDIZ[$i]."','".$MEDIDA[$i]."','".$DESCRIPCION_M[$i]."','".$CUMPLIMIENTO[$i]."')");
    $resultadoInsertUser = mysqli_query($con, $InserData);
      
      }
    
      header("location:?c=vistas&a=ConsultarFicha");
}
public function insertarDesarrolloComite(){
    $usuario        = "root";
    $password       = "";
    $servidor       = "localhost";
    $basededatos    = "acta_completas";
    $con            = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
    $db             = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");
    
    $D_ACTA    = $_REQUEST['d_acta'];
    $D_NOMBRE_APRENDIZ      = $_REQUEST['d_nombre_aprendiz'];
    $D_DESCARGOS_ITS      = $_REQUEST['d_descargos_its'];
    $D_DESCARGOS_ITS_B      = $_REQUEST['d_descargos_its_b'];
    $D_DESCARGOS_ITS_C   = $_REQUEST['d_descargos_its_c'];
    $D_DESCARGOS_APRENDIZ         = $_REQUEST['d_descargos_aprendiz'];
    
    
    /*function codAleatorio($length = 5) {
        return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
    $CODE_REFERENCIA  = codAleatorio();*/
    
    
    for ($i=0; $i < count($D_NOMBRE_APRENDIZ); $i++){
    
    $InserData =("INSERT INTO desarrollo_comite (d_acta, d_nombre_aprendiz, d_descargos_its, d_descargos_its_b, d_descargos_its_c, d_descargos_aprendiz) VALUES ('".$D_ACTA[$i]."','".$D_NOMBRE_APRENDIZ[$i]."','".$D_DESCARGOS_ITS[$i]."','".$D_DESCARGOS_ITS_B[$i]."','".$D_DESCARGOS_ITS_C[$i]."','". $D_DESCARGOS_APRENDIZ[$i]."')");
    $resultadoInsertUser = mysqli_query($con, $InserData);
      
      }
    
      header("location:?c=vistas&a=ConsultarFicha");
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
    
    
    /*function codAleatorio($length = 5) {
        return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
    $CODE_REFERENCIA  = codAleatorio();*/
    
    
    for ($i=0; $i < count($A_APRENDIZ); $i++){
    
    $InserData =("INSERT INTO  casos_anteriores (A_ficha,A_contador,A_acta,A_aprendiz,A_medida,A_descripcion,A_cumplimiento) VALUES ('".$A_FICHA[$i]."','".$A_CONTADOR[$i]."','".$A_ACTA[$i]."','".$A_APRENDIZ[$i]."','".$A_MEDIDA[$i]."','".$A_DESCRIPCION[$i]."','".$A_CUMPLIMIENTO[$i]."')");
    $resultadoInsertUser = mysqli_query($con, $InserData);
      
      }
    
      header("location:?c=vistas&a=ConsultarFicha");
}
/*fin prueba*/

/*inicio prueba2*/


/*fin prueba2*/


public function Listarusu(){
    try{
         $consulta=$this->PDO->prepare("SELECT * FROM usuario;");
        $consulta->execute();
        return $consulta->fetchALL(PDO::FETCH_OBJ);
    }catch(Exception $e){
        die($e->getMessage());
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



public function listUnic($id)
{
    try{ 
        
        $query = $this->PDO->prepare("SELECT * FROM acta where  ficha = $id");
        $query->execute(array($id));
        return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);
    }catch (Exception $e){
        die ($e->getMessage());
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







public function Obtener($id){
    try{
         $consulta=$this->PDO->prepare("SELECT * FROM acta where n_acta=?;");
        $consulta->execute(array($id));
       $r= $consulta->fetch(PDO::FETCH_OBJ);
       $p= new acta();
       $p ->setN_acta($r->n_acta);
       $p ->setActa_no($r->acta_no);
       $p ->setNom_rev($r->nom_rev);
       $p ->setCiudad($r->ciudad);
       $p ->setFecha($r->fecha);
       $p ->setHora_fin($r->hora_fin);
       $p ->setHora_in($r->hora_in);
       $p ->setLu_en($r->lu_en);
       $p ->setDireccion($r->direccion);
       $p ->setAgenda($r->agenda);
       $p ->setObjetivos($r->objetivos);
       /*$p ->setParticipantes($r->participantes);*/
       /*$p ->setInf_ficha($r->inf_ficha);*/
       $p ->setCasos_ant($r->casos_ant);
       $p ->setCasos_part($r->casos_part);
       $p ->setHechos_actuales($r->hechos_actuales);
       $p ->setDesarrollo($r->desarrollo);
       $p ->setInforme_vocero($r->informe_vocero);
       $p ->setConclusion($r->conclusion);
       $p ->setFicha($r->ficha);
       $p ->setPrograma($r->programa);
       $p ->setPrivacidad($r->privacidad);
     return $p;


    }catch(Exception $e){
        die($e->getMessage());
    }

}



public function insertarparticipantes()
{
    try{
    $query = "INSERT INTO participantes (nombres,apellidos,cargo,asistencia) VALUES (?,?,?,?);";
    $this -> PDO-> prepare($query)
                        ->execute(array(
                            $this->nombres,
                            $this->apellidos,
                            $this->cargo,
                            $this->asistencia
                           
                        ));
                        $this->n_acta=$this->PDO->lastInsertId();
                        return $this;
                    }catch(Exception $e){
                        die($e->getMessage());
                    }
                        
}




public function insertar()
{
    try{
    $query = "INSERT INTO acta (acta_no,acta_contador,nom_rev,ciudad,fecha,hora_in,hora_fin,lu_en,direccion,agenda,objetivos,inf_ficha,casos_ant,casos_part,hechos_actuales,desarrollo,informe_vocero,conclusion,ficha,programa,privacidad) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
    $this -> PDO-> prepare($query)
                        ->execute(array(
                            $this->acta_no,
                            $this->acta_contador,
                            $this->nom_rev,
                            $this->ciudad,
                            $this->fecha,
                            $this->hora_in,
                            $this->hora_fin,
                            $this->lu_en,
                            $this->direccion,
                            $this->agenda,
                            $this->objetivos,
                            $this->inf_ficha,
                            $this->casos_ant,
                            $this->casos_part,
                            $this->hechos_actuales,
                            $this->desarrollo,
                            $this->informe_vocero,
                            $this->conclusion,
                            $this->ficha,
                            $this->programa,
                            $this->privacidad
                        ));
                        $this->n_acta=$this->PDO->lastInsertId();
                        return $this;


                        
                            $query = "INSERT INTO participantes (nombres,apellidos,cargo,asistencia) VALUES (?,?,?,?);";
                            $this -> PDO-> prepare($query)
                                                ->execute(array(
                                                    $this->nombres,
                                                    $this->apellidos,
                                                    $this->cargo,
                                                    $this->asistencia
                                                   
                                                ));
                                                $this->n_acta=$this->PDO->lastInsertId();
                                                return $this;
                                            


                    }catch(Exception $e){
                        die($e->getMessage());
                    }
                        
}

public function Eliminar($id){
    try{
        $consulta="DELETE FROM acta WHERE n_acta=?;";
        $this->PDO->prepare($consulta)
                ->execute(array($id));
    }catch(Exception$e){
        die($e->getMessage());
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



public function Obtenercontenido($id){
    try{



      

         $consulta=$this->PDO->prepare("SELECT * FROM ficha where id_ficha=?;");
        $consulta->execute(array($id));
      $r= $consulta->fetch(PDO::FETCH_OBJ);
       $p= new ficha();
 

       $p ->setId_ficha($r->id_ficha);
       $p ->setN_ficha($r->N_ficha);
       $p ->setCantidad_apre($r->cantidad_apre);
       $p ->setPrograma($r->programa);
       $p ->setJornada($r->jornada);
       $p ->setTipo_forma($r->tipo_forma);
       $p ->setFecha_inicio($r->fecha_inicio);
       $p ->setFecha_fin($r->fecha_fin);
    
     return $p ;
     echo($contador);

    }catch(Exception $e){
        die($e->getMessage());
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
    try{ 
        $contador=0;
        $contador = $this->PDO->prepare("SELECT acta_contador FROM acta WHERE ficha= $ficha ORDER BY n_acta DESC LIMIT 1;");
        $contador->execute(array($ficha));
        return $contador->fetch(PDO::FETCH_OBJ);

    }catch (Exception $e){
        die ($e->getMessage());
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
public function casosAnteriores($ficha, $acta_contador){
    try{ 
        
        $query = $this->PDO->prepare("SELECT * FROM conclusiones WHERE n_ficha = $ficha AND c_contador = $acta_contador-1");
        $query->execute(array($ficha, $acta_contador));
        return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);
    }catch (Exception $e){
        die ($e->getMessage());
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

public function obtenerAnteriores($ficha, $acta_contador){
    try{ 
        
        $query = $this->PDO->prepare("SELECT * FROM casos_anteriores WHERE A_ficha = $ficha AND A_contador = $acta_contador-1");
        $query->execute(array($ficha, $acta_contador));
        return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);
    }catch (Exception $e){
        die ($e->getMessage());
    }
}

public function ObtenerDesarrolloComite($ficha){
    try{ 
        
        $query = $this->PDO->prepare("SELECT * FROM desarrollo_comite where  d_acta = $ficha");
        $query->execute(array($ficha));
        return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);
    }catch (Exception $e){
        die ($e->getMessage());
    }
}
public function obtenerVerificacion($ficha, $acta_contador){
    try{ 
        
        $query = $this->PDO->prepare("SELECT * FROM acta WHERE ficha= $ficha AND acta_contador < $acta_contador ORDER BY n_acta DESC LIMIT 1;");
        $query->execute(array($ficha, $acta_contador));
        return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);
    }catch (Exception $e){
        die ($e->getMessage());
    }
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
 public function ObtenerTranslado($ficha){

 

            $consulta=$this->PDO->prepare("SELECT COUNT(Estado) as Translado FROM aprendiz WHERE ficha = $ficha  AND Estado='TRANSLADADO'");
            $consulta->execute();
             return $consulta->fetch(PDO :: FETCH_OBJ);



}


public function ObtenerCancelado($ficha){

 

        $consulta=$this->PDO->prepare("SELECT COUNT(Estado) as Cancelado FROM aprendiz WHERE ficha = $ficha  AND Estado='CANCELADO'");
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

 

    $consulta=$this->PDO->prepare("SELECT COUNT(Estado) as CONDICIONADO FROM aprendiz WHERE ficha = $ficha  AND Estado='CONDICIONADO'");
    $consulta->execute();
     return $consulta->fetch(PDO :: FETCH_OBJ);


}

public function ObtenerAplazado($ficha){

 

    $consulta=$this->PDO->prepare("SELECT COUNT(Estado) as APLAZADO FROM aprendiz WHERE ficha = $ficha  AND Estado='APLAZADO'");
    $consulta->execute();
     return $consulta->fetch(PDO :: FETCH_OBJ);


}
public function ObtenerInduccion($ficha){

 

    $consulta=$this->PDO->prepare("SELECT COUNT(Estado) as INDUCCION FROM aprendiz WHERE ficha = $ficha  AND Estado='INDUCCIÓN'");
    $consulta->execute();
     return $consulta->fetch(PDO :: FETCH_OBJ);


}

//

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


public function getHechos_actuales()
{
    return $this->hechos_actuales;
}


public function setHechos_actuales($hechos_actuales)
{
    $this-> hechos_actuales = $hechos_actuales;

    return $this;
}

public function getDesarrollo()
{
    return $this->desarrollo;
}


public function setDesarrollo($desarrollo)
{
    $this-> desarrollo = $desarrollo;

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


public function getConclusion()
{
    return $this->conclusion;
}

public function setConclusion($conclusion)
{
    $this->conclusion = $conclusion;

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

public function getReglamento_a()
{
    return $this->reglamento_a;
}

public function setReglamento_a($reglamento_a)
{
    $this->reglamento_a = $reglamento_a;

    return $this;
}
public function getReglamento_b()
{
    return $this->reglamento_b;
}

public function setReglamento_b($reglamento_b)
{
    $this->reglamento_b = $reglamento_b;

    return $this;
}

public function getReglamento_c()
{
    return $this->reglamento_c;
}

public function setReglamento_c($reglamento_c)
{
    $this->reglamento_c = $reglamento_c;

    return $this;
}

/*conclusiones*/
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