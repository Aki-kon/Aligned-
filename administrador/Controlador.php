<?php

if(!empty($_POST["iniciar"])){
    if (empty($_POST["CorreoElectronico"]) and empty($_POST["contraseña"])) {
        echo '<div class= "alert alert-danger">Los campos estan vacios</div>';
} else {
    $CorreoElectronico=$_POST["CorreoElectronico"];
    $contraseña=$_POST["contraseña"];
    $sql=$conexion->query("Select * from registro where email='$CorreoElectronico' and contraseña='$contraseña'");
        if($datos=$sql->fetch_object()) {
        header("Location: ../panel.php");
        } else {
        echo '<div class= "alert alert-danger">Acceso Denegado, verifique la informacion.</div>';
        }
    }
}

?>