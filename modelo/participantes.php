<?php



class participantes{

    



    private   $id=null;
private   $nombre=null;
private  $apellido =null;
private   $cargo =null;
private  $asistencia =null ;



private $PDO;
public function __CONSTRUCT(){
    $this->PDO = BaseDeDatos::conectar();

}


public function ObtenerParticipantes($ficha){
    try{ 
        
        $query = $this->PDO->prepare("SELECT * FROM participantes where n_acta >1  AND n_acta = $ficha");
        $query->execute(array($ficha));
        return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);
    }catch (Exception $e){
        die ($e->getMessage());
    }
}

public function delete(){
    try{
        $query= "DELETE FROM acta WHERE n_acta=?;";
        $this-> PDO->prepare($query)
                        ->execute(array($this->n_acta));
    }catch(Exception $e){
        die($e->getMessage());

    }
}
	



public function Listarusu(){
    try{
         $consulta=$this->PDO->prepare("SELECT * FROM usuario;");
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
       $p ->setNom_rev($r->nom_rev);
       $p ->setCiudad($r->ciudad);
       $p ->setFecha($r->fecha);
       $p ->setHora_fin($r->hora_fin);
       $p ->setHora_in($r->hora_in);
       $p ->setLu_en($r->lu_en);
       $p ->setDireccion($r->direccion);
       $p ->setAgenda($r->agenda);
       $p ->setObjetivos($r->objetivos);
       $p ->setConclusion($r->conclusion);
       $p ->setFicha($r->ficha);
       $p ->setPrograma($r->programa);
     return $p;
    }catch(Exception $e){
        die($e->getMessage());
    }

}

public function Listar(){
    try{
         $consulta=$this->PDO->prepare("SELECT * FROM acta;");
        $consulta->execute();
        return $consulta->fetchALL(PDO::FETCH_OBJ);
    }catch(Exception $e){
        die($e->getMessage());
    }

}



public function Listaparti(){
    try{
        $consulta=$this->PDO->prepare("SELECT * FROM participantes where id=?;");
        $consulta->execute(array($id));
        return $consulta->fetchALL(PDO::FETCH_OBJ);
    }catch(Exception $e){
        die($e->getMessage());
    }

}



public function Participantes($id){
    try{
         $consulta=$this->PDO->prepare("SELECT * FROM acta where id=?;");
        $consulta->execute(array($id));
      $r= $consulta->fetchAll(PDO::FETCH_OBJ);
       $p= new acta();
       $p ->setN_acta($r->n_acta);
       $p ->setNom_rev($r->nom_rev);
       $p ->setCiudad($r->ciudad);
       $p ->setFecha($r->fecha);
       $p ->setHora_fin($r->hora_fin);
       $p ->setHora_in($r->hora_in);
       $p ->setLu_en($r->lu_en);
       $p ->setDireccion($r->direccion);
       $p ->setAgenda($r->agenda);
       $p ->setObjetivos($r->objetivos);
       $p ->setConclusion($r->conclusion);
       $p ->setFicha($r->ficha);
       $p ->setPrograma($r->programa);
     return $p;
    }catch(Exception $e){
        die($e->getMessage());
    }

}



public function insertarparticipantes()
{
    while(true){
      
 
        ///////// QUERY DE INSERCIÓN /////

      
   



                        
}

}


public function ListarActas(){
    try{
         $consulta=$this->PDO->prepare("SELECT * FROM acta ORDER BY n_acta DESC LIMIT 1");
        $consulta->execute();
        if ($consulta = 1) {
            echo "no datos";
        }
        return $consulta->fetchALL(PDO::FETCH_OBJ);
    }catch(Exception $e){
        die($e->getMessage());
    }

}

//

public function getId()
{
    return $this->id;
}

public function setId($id)
{
    $this->id = $id;

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



}