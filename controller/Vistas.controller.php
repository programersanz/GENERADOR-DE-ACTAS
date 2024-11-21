<?php
require_once "modelo/usuarios.php";
require_once "modelo/acta.php";
require_once "modelo/rol.php";
require_once "modelo/programa.php";
require_once "modelo/ficha.php";
require_once "modelo/basededatos.php";
require_once "modelo/participantes.php";

class VistasController{

 

    public function prueba(){
        

        require_once "vista/admin/cabecera/cabecera.php";
       require_once "vista/admin/contenido/prueba.php";
       require_once "vista/admin/footer/footer.php";
    }


        private $modelo;
       public function __CONSTRUCT(){
            $this->modelo=new acta();
       }


       public function Home(){
        require_once "login.php";

    }

            public function CrearActa(){





                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/principal.php";

               require_once "vista/admin/footer/footer.php";
            }
            


            public function Actas(){


                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/actas.php";
               require_once "vista/admin/footer/footer.php";
            }

            public function FichaContador(){


                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/FichaContador.php";
               require_once "vista/admin/footer/footer.php";
            }

            public function contraseña(){

                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/cambiarContraseña.php";

               require_once "vista/admin/footer/footer.php";
            }  
            
            public function rar(){

               require_once "Archivoss/rar.php";

               require_once "vista/admin/footer/footer.php";
            }  

            public function Particulares(){

                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/casos_particulares.php";

               require_once "vista/admin/footer/footer.php";
            }

            public function filtrarActas(){

                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/consultar_actas.php";

               require_once "vista/admin/footer/footer.php";
            }
            public function editar(){

                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/editar.php";

               require_once "vista/admin/footer/footer.php";
            }


            public function Registrar(){
                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/registro.php";

               require_once "vista/admin/footer/footer.php";
            }


            public function RegistroFicha(){
                $programa = new programa();
                $programas = $programa->listprograma();
                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/RegistroFicha.php";

               require_once "vista/admin/footer/footer.php";
            }




            
            public function RegistroPrograma(){
                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/RegistrarPrograma.php";

               require_once "vista/admin/footer/footer.php";
            }

                        
            public function ConsultarPrograma(){
                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/ConsultarPrograma.php";

               require_once "vista/admin/footer/footer.php";
            }


                                    
            public function EditarPrograma(){
                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/ProgramaEdit.php";

               require_once "vista/admin/footer/footer.php";
            }





            public function RegistroAprendiz(){

                $ficha = new ficha();
                $fichas = $ficha->fichas();
                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/RegistroAprendiz.php";

               require_once "vista/admin/footer/footer.php";
            }


            
            public function RegistroUsuExternos(){
                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/RegistroUsuExternos.php";

               require_once "vista/admin/footer/footer.php";
            }

            public function RegistroInstructor(){
                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/RegistroInstructor.php";

               require_once "vista/admin/footer/footer.php";
            }

            public function ConsultarFicha(){

                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/ConsultarFicha.php";

               require_once "vista/admin/footer/footer.php";
            }

            public function ConsultarInstructor(){

                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/ConsultarInstructor.php";

               require_once "vista/admin/footer/footer.php";
            }

            public function Editarinstructor(){

                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/InstructorEdit.php";

               require_once "vista/admin/footer/footer.php";
            }
            
            public function ConsultaUsuExternos(){

                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/ConsultaUsuExternos.php";

               require_once "vista/admin/footer/footer.php";
            }


            public function Editarfuncionario(){

                require_once "vista/admin/cabecera/cabecera.php";
                require_once "vista/admin/contenido/UsuariosExtEdit.php";

               require_once "vista/admin/footer/footer.php";
            }



            public function EditarFicha(){

               
                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/FichasEdit.php";

               require_once "vista/admin/footer/footer.php";
            }

            public function Perfil(){
                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/perfil.php";

               require_once "vista/admin/footer/footer.php";
            }


            public function Consultar(){
                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/editar.php";

               require_once "vista/admin/footer/footer.php";
            }

            public function Usuario(){
                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/usuarios.php";
               require_once "vista/admin/footer/footer.php";
            }
            
            public function ConsultarAprendiz(){
                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/ConsultarAprendiz.php";
               require_once "vista/admin/footer/footer.php";
            }
            public function AprendizEdit(){

                /*$ficha = new ficha();
                $fichas = $ficha->fichas();*/
                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/AprendizEdit.php";
               require_once "vista/admin/footer/footer.php";
            }
            

            
            public function Usuarioedit(){
                require_once "vista/admin/cabecera/cabecera.php";
               require_once "vista/admin/contenido/usuariosedit.php";
               require_once "vista/admin/footer/footer.php";
            }






            public function UsuPerfil(){
                require_once "vista/Usuario/cabecera/cabecera.php";
               require_once "vista/usuario/contenido/perfil.php";

               require_once "vista/usuario/footer/footer.php";
            }


            public function UsuConsultar(){
                require_once "vista/usuario/cabecera/cabecera.php";
               require_once "vista/usuario/contenido/consultar.php";

               require_once "vista/usuario/footer/footer.php";
            }

            public function UsuActas(){
                require_once "vista/usuario/cabecera/cabecera.php";
               require_once "vista/usuario/contenido/actas.php";

               require_once "vista/usuario/footer/footer.php";
            }








}