<?php



class conclusiones{

    



private   $id_conclusion=null;
private   $n_ficha=null;
private   $q_acta=null;
private   $Aprendiz=null;
private   $instructor=null;
private   $descripcion=null;
private   $cumplimiento=null;



private $PDO;
public function __CONSTRUCT(){
    $this->PDO = BaseDeDatos::conectar();

}


public function ObtenerConclusiones($ficha){
    try{ 
        
        $query = $this->PDO->prepare("SELECT * FROM conclusiones where q_acta >1  AND q_acta = $ficha");
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

public function getId_conclusiones()
{
    return $this->id_conclusiones;
}

public function setId_conclusiones($id_conclusiones)
{
    $this->id_conclusiones = $id_conclusiones;

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



public function getInstructor()
{
    return $this->instructor;
}

public function setInstructor($instructor)
{
    $this->instructor = $instructor;

    return $this;
}


public function getDescripcion()
{
    return $this->descripcion;
}

public function setDescricion($descripcion)
{
    $this->descripcion = $descripcion;

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



}