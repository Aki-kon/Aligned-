<?php include("template/cabecera.php");?>

<?php
include("administrador/config/bd.php");

$SentenciaSQL= $conexion->prepare("SELECT * FROM libros");
$SentenciaSQL->execute();
$listaLibros=$SentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach($listaLibros as $libro) { ?>
<div class="col-md-2">
  <div class="card">
    <img class="card-img-top" src="./img/<?php echo $libro['ImagenLibro'];?>" alt="">

     <div class= "card-body">
        <h4 class="card-tittle"><?php echo $libro['NombreLibro'];?> </h4>
        <a name="" id="" class="btn btn-primary" href="" role="button">Ver más </a>
     </div>
  </div>
</div>
<?php } ?>
<?php include("template/pie.php");?>