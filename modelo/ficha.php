<?php



class ficha{ 

    private   $e=null;
private  $id_ficha=null;
private  $ficha_contador=null;
private  $N_ficha =null;
private  $cantidad_apre =null;
private  $programa =null ;
private  $jornada =null;
private  $tipo_forma =null;
private  $aprendices =null;
private  $fecha_inicio =null ;
private  $fecha_fin =null ;



private $PDO;
public function __CONSTRUCT(){
    $this->PDO = BaseDeDatos::conectar();

}

public function insertar()

{
    try{
    $query = "INSERT INTO ficha (ficha_contador,N_ficha,cantidad_apre,programa,jornada,tipo_forma,fecha_inicio,fecha_fin) VALUES (?,?,?,?,?,?,?,?);";
    $this -> PDO-> prepare($query)
                        ->execute(array(
                            $this->ficha_contador,
                            $this->N_ficha,
                            $this->cantidad_apre,
                            $this->programa,
                            $this->jornada,
                            $this->tipo_forma,
                            $this->fecha_inicio,
                            $this->fecha_fin

                        ));
                        $this->id_ficha=$this->PDO->lastInsertId();
                        return $this;
                    }catch(Exception $e){
                        die($e->getMessage());
                    }
                        



}


public function list($ficha)
{
    try{
        $query = $this->PDO->prepare("SELECT * FROM ficha");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
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
public function fichas()
{
    try{
        $query = $this->PDO->prepare("SELECT * FROM ficha");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
    }catch (Exception $e){
        die ($e->getMessage());
    }
}



public function Actualizarficha(ficha $ficha){
    try{
        $consulta="UPDATE ficha SET
            N_ficha=?,
            cantidad_apre=?,
            programa=?,
            jornada=?,
            tipo_forma=?,
            fecha_inicio=?,
            fecha_fin=?

            WHERE id_ficha=?;
        ";
        $this->PDO->prepare($consulta)
                ->execute(array(
                     $ficha->getN_ficha(),
                     $ficha->getCantidad_apre(),
                     $ficha->getPrograma(),
                     $ficha->getJornada(),
                     $ficha->getTipo_forma(),
                     $ficha->getFecha_inicio(),
                     $ficha->getFecha_fin(),
                     $ficha->getId_ficha()


                ));
    }catch(Exception$e){
    }

   header("location:?c=vistas&a=ConsultarFicha");
       
 

}

public function ActualizarFichaContador(ficha $ficha){
    try{
        $consulta="UPDATE ficha SET
    
            ficha_contador=?

            WHERE id_ficha=?;
        ";
        $this->PDO->prepare($consulta)
                ->execute(array(

                     $ficha->getFicha_contador(),
                     $ficha->getId_ficha()


                ));
    }catch(Exception$e){
    }

   header("location:?c=vistas&a=ConsultarFicha");
       
 

}
public function ObtenerFichaContador($id){
    try{
         $consulta=$this->PDO->prepare("SELECT * FROM ficha where id_ficha=?;");
        $consulta->execute(array($id));
      $r= $consulta->fetch(PDO::FETCH_OBJ);
       $p= new ficha();

       $p ->setId_ficha($r->id_ficha);
       $p ->setFicha_contador($r->ficha_contador);

    
     return $p;


    }catch(Exception $e){
        die($e->getMessage());
    }

}



public function Eliminarfi($id){
    try{
        $consulta="DELETE FROM ficha WHERE id_ficha=?;";
        $this->PDO->prepare($consulta)
                ->execute(array($id));
    }catch(Exception$e){
        die($e->getMessage());
   }
}

public function Obtenerficha($id){
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
    
     return $p;


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




public function getId_ficha()
{
    return $this->id_ficha;
}

public function setId_ficha($id_ficha)
{
    $this->id_ficha = $id_ficha;

    return $this;
}
public function getFicha_contador()
{
    return $this->ficha_contador;
}

public function setFicha_contador($ficha_contador)
{
    $this->ficha_contador = $ficha_contador;

    return $this;
}


public function getN_ficha()
{
    return $this->N_ficha;
}

public function setN_ficha($N_ficha)
{
    $this->N_ficha = $N_ficha;

    return $this;
}



public function getCantidad_apre()
{
    return $this->cantidad_apre;
}

public function setCantidad_apre($cantidad_apre)
{
    $this->cantidad_apre = $cantidad_apre;

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



public function getJornada()
{
    return $this->jornada;
}

public function setJornada($jornada)
{
    $this->jornada = $jornada;

    return $this;
}


public function getTipo_forma()
{
    return $this->tipo_forma;
}

public function setTipo_forma($tipo_forma)
{
    $this->tipo_forma = $tipo_forma;

    return $this;
}


public function getAprendices()
{
    return $this->aprendices;
}

public function setAprendices($aprendices)
{
    $this->aprendices = $aprendices;

    return $this;
}

public function getFecha_inicio()
{
    return $this->fecha_inicio;
}

public function setFecha_inicio($fecha_inicio)
{
    $this->fecha_inicio = $fecha_inicio;

    return $this;
}


public function getFecha_fin()
{
    return $this->fecha_fin;
}

public function setFecha_fin($fecha_fin)
{
    $this->fecha_fin = $fecha_fin;

    return $this;
}



}
