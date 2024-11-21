<?php



class destacados{

private $e=null;    
private  $id_destacados=null;
private  $acta_des=null;
private  $nombre_des=null;
private  $apellido_des=null;




private $PDO;
public function __CONSTRUCT(){
    $this->PDO = BaseDeDatos::conectar();

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

//

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
}