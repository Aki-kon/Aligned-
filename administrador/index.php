<?php
include ("./config/conn.php");
include ("./controlador.php");
session_start();
error_reporting(0);
$txtCorreoElectronico=(isset($_POST['txtCorreoElectronico']))?$_POST['txtCorreoElectronico']:"";
$txtcontraseña=(isset($_POST['txtcontraseña']))?$_POST['txtcontraseña']:"";


if(isset($_SESSION["usuario"])){
  header("Location: index.php");
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

                    <form method="post" action="">

                    <div class = "form-group">
                    <label>Correo Electronico:</label>
                    <input type="text" required class="form-control" value="<?php echo $txtCorreoElectronico; ?>"name='CorreoElectronico' placeholder="Ingresa tu correo">
                    </div>

                    <div class="form-group">
                    <label >Contraseña:</label>
                    <input type="password" required class="form-control" value="<?php echo $txtcontraseña; ?>"name='contraseña' placeholder="Ingresa tu contraseña">
                    </div>
                    <p><input type="submit" name ="iniciar" value="Iniciar Sesión"></p>
                    <p><input type="submit" name ="registrar" value="Registrar Usuario"></p>
                    </form>
                    
                </div>
            </div>
            
        </div>
    </div>
  </body>
</html>


