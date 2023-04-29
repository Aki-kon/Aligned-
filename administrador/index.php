<?php
include ("./config/conn.php");
session_start();
error_reporting(0);

if(isset($_SESSION["usuario"])){
  header("Location: index.php");
}


/*
if(isset($_POST["iniciar"])){
  header("Location: ../panel.php");
}*/
if(isset($_POST["iniciar"]))
{
    $email=$_POST["CorreoElectronico"];
    $contraseña=md5($_POST["contraseña"]);

    $SentenciaSQL="SELECT * FROM registro WHERE email='$email' AND contraseña='$contraseña'";
    $resultado=mysqli_query($conexion,$SentenciaSQL);
      if($resultado->num_rows > 0)
      {
        $row= mysqli_fetch_assoc($resultado);
        $_SESSION['usuario']=$row['usuario'];
        header("Location: ../panel.php");
      }else
        {
        echo "<script>alert('La contraseña o el email son incorrectos')</script>";
        }
}
if(isset($_POST["registrar"])){
  header("Location: ./seccion/registrar.php");
}
?>

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

                    <form method="post">
                    <div class = "form-group">
                    <label>Correo Electronico:</label>
                    <input type="text" class="form-control" name='CorreoElectronico' placeholder="Ingresa tu correo">
                    <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña:</label>
                    <input type="password" class="form-control" name='contraseña' placeholder="Ingresa tu contraseña">
                    <p><input type="submit" name ="iniciar" value="Iniciar Sesión"></p>
                    <p><input type="submit" name ="registrar" value="Registrar Usuario"></p>

                    </div>
                    </form>
                    
                </div>
            </div>
            
        </div>
    </div>
  </body>
</html>


