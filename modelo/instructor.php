





<?php



class instructor{

    


private   $e=null;
private   $nombre=null;
private   $apellido =null;
private   $telefono =null;
private   $rol =null;
private   $correo =null;
private   $contraseña =null;




private $PDO;
public function __CONSTRUCT(){
    $this->PDO = BaseDeDatos::conectar();

}



public function Obtener($id){
    try{
        $consulta= $this->PDO->prepare("SELECT * FROM instructor WHERE id_instructor=?;");
        $consulta->execute(array($id));
        $r=$consulta->fetch(PDO::FETCH_OBJ);
        $p= new instructor();
        $p ->setId_instructor($r->id_instructor);
        $p ->setNombre($r->nombre);
        $p ->setApellido($r->apellido);
        $p ->setTelefono($r->telefono);
        $p ->setRol($r->rol);
        $p ->setCorreo($r->correo);
        $p ->setContraseña($r->contraseña);

        return $p;

    }catch(Exception $e){
        die($e->getMessage());
    }


}



public function Eliminarinstructor($id){
    try{
        $consulta="DELETE FROM instructor WHERE id_instructor=?;";
        $this->PDO->prepare($consulta)
                ->execute(array($id));
    }catch(Exception$e){
        die($e->getMessage());
   }
}



public function insertarinstructor()
{
    try{
    $query = "INSERT INTO instructor (nombre,apellido,telefono,rol,correo,contraseña) VALUES (?,?,?,?,?,?);";
    $this -> PDO-> prepare($query)
                        ->execute(array(
                            $this->nombre,
                            $this->apellido,
                            $this->telefono,
                            $this->rol,
                            $this->correo,
                            $this->contraseña
                            
                        ));
                        $this->id_instructor=$this->PDO->lastInsertId();
                        return $this;
                    }catch(Exception $e){
                        die($e->getMessage());
                    }
                        
}




public function Actualizarinstructor(instructor $instructor){
    try{
        $consulta="UPDATE instructor SET
            nombre=?,
            apellido=?,
            telefono=?,
            rol=?,
            correo=?,
            contraseña =?

            WHERE id_instructor=?;
        ";
        $this->PDO->prepare($consulta)
                ->execute(array(
                     $instructor->getNombre(),
                     $instructor->getApellido(),
                     $instructor->getTelefono(),
                     $instructor->getRol(),
                     $instructor->getCorreo(),
                     $instructor->getContraseña(),
                     $instructor->getId_instructor()


                ));
    }catch(Exception$e){
        
         header("location:?c=vistas&a=ConsultarInstructor");
    }

}

public function getId_instructor()
{
    return $this->id_instructor;
}

public function setId_instructor($id_instructor)
{
    $this->id_instructor = $id_instructor;

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


public function getTelefono()
{
    return $this->telefono;
}

public function setTelefono($telefono)
{
    $this->telefono = $telefono;

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


public function getCorreo()
{
    return $this->correo;
}

public function setCorreo($correo)
{
    $this->correo = $correo;

    return $this;
}


public function getContraseña()
{
    return $this->contraseña;
}

public function setContraseña($contraseña)
{
    $this->contraseña = $contraseña;

    return $this;
}


}