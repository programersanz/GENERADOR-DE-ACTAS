
<?php



class funcionario{

    


    private   $e=null;
    private   $id_funcionario=null;
private   $nombre=null;
private  $apellido =null;
private   $cargo =null;



private $PDO;
public function __CONSTRUCT(){
    $this->PDO = BaseDeDatos::conectar();

}


public function Eliminarfuncionario($id){
    try{
        $consulta="DELETE FROM funcionario WHERE id_funcionario=?;";
        $this->PDO->prepare($consulta)
                ->execute(array($id));
    }catch(Exception$e){
        die($e->getMessage());
   }
}

public function funcio()
{
    try{
        $query = $this->PDO->prepare("SELECT * FROM funcionario");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
    }catch (Exception $e){
        die ($e->getMessage());
    }
}




public function insertarfuncionario()
{
    try{
    $query = "INSERT INTO funcionario (nombre,apellido,cargo) VALUES (?,?,?);";
    $this -> PDO-> prepare($query)
                        ->execute(array(
                            $this->nombre,
                            $this->apellido,
                            $this->cargo

                        ));
                        $this->id_funcionario=$this->PDO->lastInsertId();
                        return $this;
                    }catch(Exception $e){
                        die($e->getMessage());
                    }
                        
}






public function Actualizarfuncionario(funcionario $funcionario){
    try{
        $consulta="UPDATE funcionario SET
           
            nombre=?,
            apellido=?,
            cargo=?


            WHERE id_funcionario=?;
        ";
        $this->PDO->prepare($consulta)
                ->execute(array(
                     
                     $funcionario->getNombre(),
                     $funcionario->getApellido(),
                     $funcionario->getCargo(),
                     $funcionario->getId_funcionario()



                ));
    }
    
    
    catch(Exception$e){
    }

   header("location:?c=vistas&a=ConsultaUsuExternos");

 

}





public function Obtenerfuncionario($id){
    try{
         $consulta=$this->PDO->prepare("SELECT * FROM funcionario where id_funcionario=?;");
        $consulta->execute(array($id));
      $r= $consulta->fetch(PDO::FETCH_OBJ);
       $p= new funcionario();

       $p ->setId_funcionario($r->id_funcionario);
       $p ->setNombre($r->nombre);
       $p ->setApellido($r->apellido);
       $p ->setCargo($r->cargo);

    
     return $p;


    }catch(Exception $e){
        die($e->getMessage());
    }

}


public function Listarfuncionario(){
    try{
         $consulta=$this->PDO->prepare("SELECT * FROM funcionario;");
        $consulta->execute();
        return $consulta->fetchALL(PDO::FETCH_OBJ);
    }catch(Exception $e){
        die($e->getMessage());
    }

}


public function getId_funcionario()
{
    return $this->id_funcionario;
}

public function setId_funcionario($id_funcionario)
{
    $this->id_funcionario = $id_funcionario;

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

}