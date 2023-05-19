<?php include("./template/cabecera.php");?>
<?php
include("administrador/config/bd.php");

$SentenciaSQL= $conexion->prepare("SELECT * FROM libros");
$SentenciaSQL->execute();
$listaLibros=$SentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="col-md-7">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
             <th>Autor</th>
            <th>Fecha</th>
            <th>Editorial</th>
            <th>Descripcion</th>
        </tr>
    </thead>
    <tbody>
        <?php   foreach ($listaLibros as $libro) { ?>
        <tr>
            <td><?php echo $libro['ID'];?> </td>
            <td><?php echo $libro['NombreLibro'];?> </td>
            <td><?php echo $libro['AutorLibro'];?> </td>
            <td><?php echo $libro['FechaPublicacionLibro'];?> </td>
            <td><?php echo $libro['EditorialLibro'];?> </td>
            <td><?php echo $libro['DescripcionLibro'];?> </td>

            <td>
      
        
        </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>

<?php include("./template/pie.php");?>