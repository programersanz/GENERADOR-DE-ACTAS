<?php



class usuario{

    
    private   $id=null;

    private   $user=null;
private   $nombre=null;
private  $apellido =null;
private   $correo =null;
private  $rol =null ;
private  $telefono =null;
private  $contrasena =null;
private  $documento =null;



private $PDO;
public function __CONSTRUCT(){
    $this->PDO = BaseDeDatos::conectar();

}


public function Actualizarusu(usuario $usuario){
    try{
        $consulta="UPDATE usuario SET
            nombre=?,
            apellido=?,
            correo=?,
            telefono=?,
            contrasena=?,
            documento=?

            WHERE id=?;
        ";
        $this->PDO->prepare($consulta)
                ->execute(array(
                     $usuario->getNombre(),
                     $usuario->getApellido(),
                     $usuario->getCorreo(),
                     $usuario->getTelefono(),
                     $usuario->getContrasena(),
                     $usuario->getDocumento(),

                     $usuario->getId()


                ));
    }catch(Exception$e){
   }

   header("location:?c=vistas&a=Usuario");
       


}

public function ActualizarContraseña(usuario $usuario){
    try{
        $consulta="UPDATE usuario SET
          
            contrasena=?
    

            WHERE id=?;
        ";
        $this->PDO->prepare($consulta)
                ->execute(array(
  
                     $usuario->getContrasena(),


                     $usuario->getId()


                ));
    }catch(Exception$e){
   }

   header("location:?c=vistas&a=Usuario");
       


}

public function ObtenerContra($id){
    try{
         $consulta=$this->PDO->prepare("SELECT * FROM usuario where id=?;");
        $consulta->execute(array($id));
      $r= $consulta->fetch(PDO::FETCH_OBJ);
       $p= new usuario();
       $p ->setId($r->id);
       $p ->setContrasena($r->contrasena);
   


     return $p;


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
	

public function Obtenerusu($id){
    try{
         $consulta=$this->PDO->prepare("SELECT * FROM usuario where id=?;");
        $consulta->execute(array($id));
      $r= $consulta->fetch(PDO::FETCH_OBJ);
       $p= new usuario();
       $p ->setId($r->id);
       $p ->setNombre($r->nombre);
       $p ->setApellido($r->apellido);
       $p ->setCorreo($r->correo);
       $p ->setRol($r->rol);
       $p ->setTelefono($r->telefono);
       $p ->setDocumento($r->documento);
       $p ->setContrasena($r->contrasena);

     return $p;


    }catch(Exception $e){
        die($e->getMessage());
    }

}


public function insertar()
{
    try{
    $query = "INSERT INTO usuario (nombre,apellido,correo,rol,telefono,contrasena,documento) VALUES (?,?,?,?,?,?,?);";
    $this -> PDO-> prepare($query)
                        ->execute(array(

                            $this->nombre,
                            $this->apellido,
                            $this->correo,
                            $this->rol,
                            $this->telefono,
                            $this->contrasena,
                            $this->documento
                  
                        ));
                        $this->n_acta=$this->PDO->lastInsertId();
                        return $this;
                    }catch(Exception $e){
                        die($e->getMessage());
                    }
                        
}


public function Eliminarusu($id){
    try{
        $consulta="DELETE FROM usuario WHERE id=?;";
        $this->PDO->prepare($consulta)
                ->execute(array($id));
    }catch(Exception$e){
        die($e->getMessage());
   }
}


public function verPerfil()//($Id_Usuario) intentar esto
{
    try{
        $Id_Usuario=$_SESSION['user']->getId_Usuario();
        $query = $this->PDO->prepare("SELECT * FROM usuario where Id_Usuario=?;");
        $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $query->execute(array($Id_Usuario));
        echo(var_dump($Id_Usuario));
       return $query->fetch();
       
    }catch (Exception $e){
        die ($e->getMessage());
    }
}



public function login ($correo, $contrasena) 
    {
          //  die(var_dump($this));
        try{
            $query = $this->PDO ->prepare("SELECT * FROM usuario WHERE correo=? AND contrasena=?;");
            $query->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $query->execute(array($correo,$contrasena));
            $result = $query->fetch();
//$this->getId_Usuario=$this->PDO->lastInsertId();

            if($result)// metodo para verificar la contraseña, compara el password que estamos ingresando con el que esta en la bd
                                {   
                                    $result->PDO = null;
                                    $_SESSION['user']=$result;
                                    return $result;  
                                }else{
                                    
                                    return false;
                                }

        }catch(Exception $e){
            die($e->getMessage());
        } //QUEDAMOS EN 1:04:47
    }
//

public function getId()
{
    return $this->id;
}

public function setId($id)
{
    $this->id = $id;

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


public function getCorreo()
{
    return $this->correo;
}

public function setCorreo($correo)
{
    $this->correo = $correo;

    return $this;
}


public function getRol()
{
    return $this->rol;
}

public function setRol($rol)
{
    $this->rol = $rol;

    return $this;
}


public function getTelefono()
{
    return $this->telefono;
}

public function setTelefono($telefono)
{
    $this->telefono = $telefono;

    return $this;
}

public function getContrasena()
{
    return $this->contrasena;
}

public function setContrasena($contrasena)
{
    $this->contrasena = $contrasena;

    return $this;

}


public function getDocumento()
{
    return $this->documento;
}

public function setDocumento($documento)
{
    $this->documento = $documento;

    return $this;

}


}