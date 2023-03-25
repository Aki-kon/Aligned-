<?php
include "conn.php";
session_start();
error_reporting(0);

if(isset($_SESSION["usuario"])){
  header("Location: inicio.php");
}

if(isset($_POST["Submit"])){
  $email=$_POST["email"];
  $contraseña=md5($_POST["contraseña"]);

  $sql="SELECT * FROM sitio where email='$email' AND contraseña='$contraseña'";
  $result =mysqli_query($conn, $sql);

  if($result->num_rows>0){
    $row=mysqli_fetch_assoc($result);
    $_SESSION['usuario']=$row['usuario'];
    header("Location: index.php");


  }}
  else{
    echo"<script>alert('El correo o la contraseña son incorrectos')</script>;
  }


?>

<?php $url="http://".$_SERVER["HTTP_HOST"]."/FUTURE-SW"?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
<body>
    <div class="container">
        <div class="row">
          <div class="col-md-4">
            
          </div>
            <div class="col-md-4"> 
              <br/> <br/> <br/>        
                <div class="card">
                    <div class="card-header">
                        Inicio de Sesión
                    </div>

                    <form>

                    <div class = "form-group">
                    <label>Usuario</label>
                    <input type="text" class="form-control" name='Correo Electronico' placeholder="Ingresa tu correo">
                    <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña:</label>
                    <input type="password" class="form-control" name='contraseña' placeholder="Ingresa tu contraseña">
                    </div>
               <a name="" id="" class="btn btn-primary" href= "<?php echo $url;?>/administrador/inicio.php"> Inicio Sesion </a>
               <a name="" id="" class="btn btn-primary" href="<?php echo $url;?>/administrador/seccion/registrar.php" role="button">Crear usuario</a>
              
               
                    </form>
                    
                </div>
            </div>
            
        </div>
    </div>
  </body>
</html>