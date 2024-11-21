<?php



class medidaF{

private $e=null;    
private  $id_medida=null;
private  $medida_formativa=null;
private  $descripcion_medida=null;




private $PDO;
public function __CONSTRUCT(){
    $this->PDO = BaseDeDatos::conectar();

}

public function obtenermedida_formativa()
{
    try{
        $query = $this->PDO->prepare("SELECT * FROM medida_formativa");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
    }catch (Exception $e){
        die ($e->getMessage());
    }
}

//

public function getId_medida()
{
    return $this->id_medida;
}

public function setId_medida($id_medida)
{
    $this->id_medida = $id_medida;

    return $this;
}


public function getMedida_formativa()
{
    return $this->medida_formativa;
}

public function setMedida_formativa($medida_formativa)
{
    $this->medida_formativa = $medida_formativa;

    return $this;
}


public function getDescripcion_medida()
{
    return $this->descripcion_medida;
}

public function setDescripcion_medida($descripcion_medida)
{
    $this->descripcion_medida = $descripcion_medida;

    return $this;
}
}