<?php
include ("../config/conn.php");
error_reporting(0);
session_start();

if(isset($_SESSION["usuario"])){
    header("Location: registrar.php");
}

if(isset($_POST["register"]))
{
    $usuario=$_POST["usuario"];
    $email=$_POST["email"];
    $contraseña=($_POST["contraseña"]);
    $password=($_POST["password"]);

    if($contraseña==$password)
    {
        $SentenciaSQL="SELECT * FROM registro where email='$email'";
        $resultado=mysqli_query($conexion, $SentenciaSQL);
        if(!$resultado->num_rows>0){
            $SentenciaSQL="INSERT INTO registro(usuario,email,contraseña,password) VALUES ('$usuario','$email','$contraseña','$password')";
            $resultado=mysqli_query($conexion,$SentenciaSQL);
            if($resultado){
                echo "<script>alert('Usuario registrado')</script>";
                $usuario="";
                $email="";
                $_POST["contraseña"]="";
                $_POST["password"]="";
            }else{
                echo "<script>alert('Hubo un error')</script>"; 
            }
        }else{
            echo "<script>alert('El correo ya existe')</script>";
        }

    }else{
        echo "<script>alert('Las contraseñas no coinciden')</script>";
    }
}

?>

<div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Registrar</h2>

  <form class="login-container" method="post">
    <p><input type="email" name="email" placeholder="Email" required></p>
    <p><input type="text" name="usuario" placeholder="Usuario" required></p>
    <p><input type="password" name="contraseña" placeholder="Contraseña" required></p>
    <p><input type="password" name="password" placeholder="Repetir contraseña" required></p>
    <p><input type="submit" name ="register" value="Registrar"></p>
    <link rel="stylesheet" href="registro.css">
  </form>
</div>