<?php

$server ="localhost";
$user="root";
$pass="";
$database="sitio";

$conn=mysqli_connect($server,$user,$pass,$database);

if(!$conn){
    die("Conexion fallida");
}
?>