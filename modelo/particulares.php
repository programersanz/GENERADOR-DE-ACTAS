<?php



class particulares{

    



private   $id_casos=null;
private   $C_ficha=null;
private   $C_acta=null;
private   $nombre_aprendiz=null;
private   $nombre_its=null ;
private   $description=null ;



private $PDO;
public function __CONSTRUCT(){
    $this->PDO = BaseDeDatos::conectar();

}


public function ObtenerCasosP($ficha){
    try{ 
        
        $query = $this->PDO->prepare("SELECT * FROM casos_especiales where C_acta >1  AND C_acta = $ficha");
        $query->execute(array($ficha));
        return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);
    }catch (Exception $e){
        die ($e->getMessage());
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
public function casos($id){
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



public function Listar(){
    try{
         $consulta=$this->PDO->prepare("SELECT * FROM acta;");
        $consulta->execute();
        return $consulta->fetchALL(PDO::FETCH_OBJ);
    }catch(Exception $e){
        die($e->getMessage());
    }

}


public function ListarActas(){
    try{
         $consulta=$this->PDO->prepare("SELECT * FROM acta ORDER BY n_acta DESC LIMIT 1");
        $consulta->execute();
        if ($consulta==0) {
            echo "no datos";
        }
        return $consulta->fetchALL(PDO::FETCH_OBJ);
    }catch(Exception $e){
        die($e->getMessage());
    }

}

//

public function getId_casos()
{
    return $this->id_casos;
}

public function setId_casos($id_casos)
{
    $this->id_casos = $id_casos;

    return $this;
}


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



}