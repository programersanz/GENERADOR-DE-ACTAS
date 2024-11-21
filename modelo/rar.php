<?php



class Rar{

    



    private   $id=null;
private   $nombre=null;
private  $apellido =null;
private   $cargo =null;
private  $asistencia =null ;



private $PDO;
public function __CONSTRUCT(){
    $this->PDO = BaseDeDatos::conectar();

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