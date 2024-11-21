<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="Vista/css/style.css" />
    <title>login</title>
  </head>
  <body>
    <div class="containers">
      <div class="forms-container">
        <div class="signin-signup">


          <form  action="?c=Usuarios&a=validar" method="post" class="sign-in-form">
          
            <div class="container-fluid">
          <div  style="width: 30rem; margin:auto">
          <div class="card-body">
            <center>
          <h2 class="title">Iniciar sesión</h2>
         
          </center>
                          
                          <div class="col">
                         
                      <label for="">correo </label>
               
                      <input name="correo" type="text" placeholder="Correo" maxlength="40" oninput="maxlengthNumber(this);"  class="form-control" required/>
                      <br>
                      
                  
                    <label for="">Contraseña</label>
                  
                    <input  name="contrasena" id="Contrasena_Usuario3" type="password" placeholder="contraseña" maxlength="11" oninput="maxlengthNumber(this);" class="form-control" required/>
                    
                  </div>
             <br>     
   

 

    <style>
       
          
       input[type=checkbox] {
           vertical-align: middle;
           position: relative;
           bottom: 1px;
       }
         
       label {
           display: block;
       }
   </style>
   <center>
 <div>
       <label><input class ="" type="checkbox"  id="exampleCheck1"  onclick="mostrar3()" value="ver"> Ver contraseña</label>
   </div>
   </center>

              
              
             


              <!-- con esto se ve el ojito de la contraseña -->
              <script  type="text/javascript">
              function mostrar3(){
                  var tipo = document.getElementById("Contrasena_Usuario3");
              
                  if( tipo.type== 'password'){
                      tipo.type='text';
                  } else{
                      tipo.type ='password';
              
              
                  }
                }
              </script>
                          <!-- esto evita el desbordamiento de datos-->
                          <script> 
                          function maxlengthNumber(obj) {
                            if (obj.value.length > obj.maxLength) {
                              obj.value = obj.value.slice(0, obj.maxLength);
                            }
                          }
                        </script>

                                    <!-- esto evita el desbordamiento de datos-->

            <center>
              <a  id="" href="?c=usuario&a=recuperarPass&Start=1">
              
              Recuperar contraseña
             </a>
             </center>

             <br>
<center>
            <input type="submit" value="Ingresa" class="btn solid" />
            </center>


</div>
</div>
</div>



            
          </form>



   <div>

  <div class="icon"  > 
 
  
  <style>
       
          
        input[type=checkbox] {
            vertical-align: middle;
            position: relative;
            bottom: 1px;
        }
          
        label {
            display: block;
        }
    </style>
  <div>
      
    </div>

    


    </div>
</div>

</div>



  
  </div>


  </div>


</div>











          




<script  type="text/javascript">
  function mostrar2(){
var tipo = document.getElementById("Contrasena_Usuario2");

if( tipo.type== 'password'){
tipo.type='text';
} else{
tipo.type ='password';


}

var tipo = document.getElementById("Contrasena_Usuario");

if( tipo.type== 'password'){
tipo.type='text';
} else{
tipo.type ='password';


}


}


</script>

   
        </div>
      </div>

      <div class="panels-containers">
        <div class="panel left-panel">
          <div class="content">
           
           


          </div>
          <img src="multimedia/logo.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">

           

          </div>
          <img src="Views/multimedia/logo.png" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="Views/js/app.js"></script>
    <script src="Views/js/registro.js"></script>
    
  </body>
</html>