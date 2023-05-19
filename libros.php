<?php include("template/cabecera.php");?>

<?php
include("administrador/config/bd.php");

$SentenciaSQL= $conexion->prepare("SELECT * FROM libros");
$SentenciaSQL->execute();
$listaLibros=$SentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST["informacion"])){
  header("Location: ./informacion.php");
}
?>
<form method="post">
<p><input type="submit" class="btn btn-primary"  name ="informacion" value="VER LISTA DE LIBROS DISPONIBLES "></p>
</form>
<?php foreach($listaLibros as $libro) { ?>

<div class="col-md-2">
  <div class="card">
    <img class="card-img-top" src="./img/<?php echo $libro['ImagenLibro'];?>" alt="">

     <div class= "card-body">
        <h4 class="card-tittle"><?php echo $libro['NombreLibro'];?> </h4>
      </div>
  </div>
</div>
<?php } ?>

<?php include("template/pie.php");?>