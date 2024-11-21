<?php



class probando{

    



private   $id=null;
private   $A_ficha=null;
private   $A_acta=null;
private   $A_aprendiz=null;
private   $A_instructor=null;
private   $A_descripcion=null;
private   $A_cumplimiento=null;



private $PDO;
public function __CONSTRUCT(){
    $this->PDO = BaseDeDatos::conectar();

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



}