<?php



class aprendiz{
    
private  $id_aprendiz=null;
private  $ficha=null;
private  $Tipo=null;
private  $Numero=null;
private  $Celular=null;
private  $Estado=null;
private  $Nombre_aprendiz=null;
private  $Apellido_aprendiz=null;
private  $documento=null;
private  $Correo=null;
private  $Telefono=null;
private  $Modalidad=null;
private  $Nivel_forma=null;
private  $Estado_forma=null;



private $PDO;
public function __CONSTRUCT(){
    $this->PDO = BaseDeDatos::conectar();

}
public function Actualizar(aprendiz $aprendiz){
    try{
        $consulta="UPDATE aprendiz SET
            ficha=?,
            Tipo=?,
            Numero=?,
            Nombre_aprendiz=?,
            Apellido_aprendiz=?,
            Celular=?,
            Correo=?,
            Estado=?

            WHERE id_aprendiz=?;
        ";
        $this->PDO->prepare($consulta)
                ->execute(array(
                     $aprendiz->getFicha(),
                     $aprendiz->getTipo(),
                     $aprendiz->getDocumento(),
                     $aprendiz->getNombre(),
                     $aprendiz->getApellido(),
                     $aprendiz->getTelefono(),
                     $aprendiz->getCorreo(),
                     $aprendiz->getEstado_forma(),
                     $aprendiz->getId_aprendiz()


                ));
    }catch(Exception$e){
    }

   header("location:?c=vistas&a=ConsultarAprendiz");
       
 

}
public function Obtener($id){
    try{
        $consulta= $this->PDO->prepare("SELECT * FROM aprendiz WHERE id_aprendiz=?;");
        $consulta->execute(array($id));
        $r=$consulta->fetch(PDO::FETCH_OBJ);
        $p= new aprendiz();
        $p ->setId_aprendiz($r->id_aprendiz);
        $p ->setFicha($r->ficha);
        $p ->setTipo($r->Tipo);
        $p ->setDocumento($r->Numero);
        $p ->setNombre($r->Nombre_aprendiz);
        $p ->setApellido($r->Apellido_aprendiz);
        $p ->setTelefono($r->Celular);
        $p ->setCorreo($r->Correo);
        $p ->setEstado_forma($r->Estado);

        return $p;

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

public function listprograma()
{
    try{
        $query = $this->PDO->prepare("SELECT * FROM programa");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS,_CLASS_);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
    }catch (Exception $e){
        die ($e->getMessage());
    }
}
	
public function insertar()
{
    try{
    $query = "INSERT INTO aprendiz (ficha, Tipo, Numero, Nombre_aprendiz,Apellido_aprendiz, Celular, Correo, Estado) VALUES (?,?,?,?,?,?,?,?);";
    $this -> PDO-> prepare($query)
                        ->execute(array(

                            $this->ficha,
                            $this->Tipo,
                            $this->Numero,
                            $this->Nombre_aprendiz,
                            $this->Apellido_aprendiz, 
                            $this->Celular,
                            $this->Correo,
                            $this->Estado
                  
                        ));
                        $this->n_acta=$this->PDO->lastInsertId();
                        return $this;
                    }catch(Exception $e){
                        die($e->getMessage());
                    }
                        
}


public function EliminarApre($id_aprendiz){
    try{
        $consulta="DELETE FROM aprendiz WHERE id_aprendiz=?;";
        $this->PDO->prepare($consulta)
                ->execute(array($id_aprendiz));
    }catch(Exception$e){
        die($e->getMessage());
   }
}





//



public function getTipo()
{
    return $this->Tipo;
}

public function setTipo($Tipo)
{
    $this->Tipo = $Tipo;

    return $this;
}

public function getId_aprendiz()
{
    return $this->id_aprendiz;
}

public function setId_aprendiz($id_aprendiz)
{
    $this->id_aprendiz = $id_aprendiz;

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



public function getNombre()
{
    return $this->Nombre_aprendiz;
}

public function setNombre($Nombre_aprendiz)
{
    $this->Nombre_aprendiz = $Nombre_aprendiz;

    return $this;
}


public function getApellido()
{
    return $this->Apellido_aprendiz;
}

public function setApellido($Apellido_aprendiz)
{
    $this->Apellido_aprendiz = $Apellido_aprendiz;

    return $this;
}

public function getDocumento()
{
    return $this->Numero;
}

public function setDocumento($Numero)
{
    $this->Numero = $Numero;

    return $this;
}



public function getCorreo()
{
    return $this->Correo;
}

public function setCorreo($Correo)
{
    $this->Correo = $Correo;

    return $this;
}


public function getTelefono()
{
    return $this->Celular;
}

public function setTelefono($Celular)
{
    $this->Celular = $Celular;

    return $this;
}


public function getModalidad()
{
    return $this->Modalidad;
}

public function setModalidad($Modalidad)
{
    $this->Modalidad = $Modalidad;

    return $this;
}

public function getNivel_forma()
{
    return $this->Nivel_forma;
}

public function setNivel_forma($Nivel_forma)
{
    $this->Nivel_forma= $Nivel_forma;

    return $this;

}


public function getEstado_forma()
{
    return $this->Estado;
}

public function setEstado_forma($Estado)
{
    $this->Estado = $Estado;

    return $this;

}


}