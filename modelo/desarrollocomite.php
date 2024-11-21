<?php



class desarrollocomite{

    private  $id_desarrollo=null;    
    private  $d_acta=null;    
    private  $d_nombre_aprendiz=null;
    private  $d_descargos_its=null;
    private  $d_descargos_its_b=null;
    private  $d_descargos_its_c=null;
    private  $d_descargos_aprendiz=null;


private $PDO;
public function __CONSTRUCT(){
    $this->PDO = BaseDeDatos::conectar();

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

//

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
}