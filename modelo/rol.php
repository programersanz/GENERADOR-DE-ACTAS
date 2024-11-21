<?php

class Rol
{
    private  ?string$id_rol=null;
    private  ?string$roles=null;

   

    private $PDO;
    public function __CONSTRUCT(){
        $this->PDO = BaseDeDatos::conectar();
    
    }
    
    
    
//metodos
public function list()
{
    try{
        $query = $this->PDO->prepare("SELECT * FROM rol");
        $query->execute();
       return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de rol y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
    }catch (Exception $e){
        die ($e->getMessage());
    }
}

public function insert()
{
    try{
    $query = "INSERT INTO rol (roles) VALUES (?);";
    $this -> PDO-> prepare($query)
                        ->execute(array(
                            $this->roles
                        ));
                        $this->id_rol=$this->PDO->lastInsertId();
                        return $this;
                    }catch(Exception $e){
                        die($e->getMessage());
                    }
                        
}


public function update()
{
    try{
        $query = "UPDATE rol SET
                        roles = ?
                        WHERE id_rol = ?;";
        $this->PDO->prepare($query)
                        ->execute(array(
                            $this->getNombre_Rol(),
                            $this->getId_Rol()

                        ));
        return $this;
    }catch(Exception $e){
        die($e->getMessage());
    }
}

public function getById($id_rol){
    try{
    $query= "SELECT * FROM rol where id_rol=?;";
    $query= $this-> PDO-> prepare($query);
    $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
    $query->execute(array($id_rol));
    return $query->fetch();

}catch(Exception $e){
    die($e->getMessage());
    }
}
public function delete(){
    try{
        $query= "DELETE FROM rol WHERE id_rol=?;";
        $this-> PDO->prepare($query)
                        ->execute(array($this->id));
    }catch(Exception $e){
        die($e->getMessage());

    }
}
    /**
     * Get the value of Id_Rol
     */ 
    public function getId_rol()
    {
        return $this->id_rol;
    }

    /**
     * Set the value of Id_Rol
     *
     * @return  self
     */ 
    public function setId_rol($id_rol)
    {
        $this->id_rol = $id_rol;

        return $this;
    }

    /**
     * Get the value of Nombre_Rol
     */ 
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set the value of Nombre_Rol
     *
     * @return  self
     */ 
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

}