<?php 
session_start();

if(isset($_SESSION['usuario'])){
  header("Location: panel.php");
}
include("template/cabecera.php");
?>
<div class="jumbotron centrar-texto">
        <h1 class="display-3 contenido">Bienvenidos</h1>
        <br><br><br>
    <div>
    <h2>En este momento te encuentras en lo que nos gusta llamar el futuro.</h2>
<p>Esta es nuestra biblioteca en linea donde ofrecemos un gran catalogo de libros de <a href="#">uso libre.</a></p>
<p><small>Busca y renueva tus conociminetos con nosotros.</small></p>
<p> Adelante <em> se libre de emprender una nueva aventura</em>.</p>
    </div>
    <div><img src="img/Logo_NPCS.png" alt=""></div>
      </div>
<?php include("template/pie.php");?>