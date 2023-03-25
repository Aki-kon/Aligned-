<?php
include ("../config/conn.php");
error_reporting(0);
session_start();

if(isset($_SESSION["usuario"])){
    header("Location: inicio.php");
}

if(isset($_POST["Submit"]))
{
    $usuario=$_POST["usuario"];
    $email=$_POST["email"];
    $contraseña=md5($_POST["contraseña"]);
    $password=md5($_POST["password"]);

    if($contraseña==$password)
    {
        $sql="SELECT * FROM registro where email='$email'";
        $result=mysqli_query($conn, $sql);

        if($result->num_rows>0){
            $sql="INSERT INTO registro(usuario, email, contraseña) VALUE('$usuario','$email','$contraseña' ";
            $result=mysqli_query($conn,$sql);

            if($result){
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
  
  <h2 class="login-header">Registro</h2>

  <form class="login-container">
    <p><input type="email" placeholder="Email" required></p>
    <p><input type="text" placeholder="Usuario" required></p>
    <p><input type="password" placeholder="Contraseña" required></p>
    <p><input type="password" placeholder="Repetir contraseña" required></p>
    <p><input name ="Submit" type="submit" value="Registrar"></p>
    
    <link rel="stylesheet" href="registro.css">
  </form>
</div>