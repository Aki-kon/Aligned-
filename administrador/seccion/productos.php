<?php include("../template/cabecera.php");?>
<?php 

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$txtAutor=(isset($_POST['txtAutor']))?$_POST['txtAutor']:"";
$txtFecha=(isset($_POST['txtFecha']))?$_POST['txtFecha']:"";
$txtEditorial=(isset($_POST['txtEditorial']))?$_POST['txtEditorial']:"";
$txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";


include("../config/bd.php");

switch($accion){

    case"Agregar":

            $SentenciaSQL= $conexion->prepare("INSERT INTO libros (NombreLibro,ImagenLibro,AutorLibro,FechaPublicacionLibro,EditorialLibro,DescripcionLibro) VALUES (:NombreLibro,:ImagenLibro,:AutorLibro,:FechaPublicacionLibro,:EditorialLibro,:DescripcionLibro);");
            $SentenciaSQL->bindParam(':NombreLibro',$txtNombre);

            $fecha = new  DateTime();
            $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";

            $tmpImagen=$_FILES["txtImagen"]["tmp_name"];
            if($tmpImagen!="")
            {
                move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);
            }
            $SentenciaSQL->bindParam(':ImagenLibro',$nombreArchivo);
            $SentenciaSQL->bindParam(':AutorLibro',$txtAutor);
            $SentenciaSQL->bindParam(':FechaPublicacionLibro',$txtFecha);
            $SentenciaSQL->bindParam(':EditorialLibro',$txtEditorial);
            $SentenciaSQL->bindParam(':DescripcionLibro',$txtDescripcion);
            $SentenciaSQL->execute();

            header("Location:productos.php");

            break;
    case"Modificar":

        $SentenciaSQL= $conexion->prepare("UPDATE libros SET NombreLibro=:NombreLibro WHERE ID=:ID");
        $SentenciaSQL->bindParam(':NombreLibro',$txtNombre);
        $SentenciaSQL->bindParam(':ID',$txtID);
        $SentenciaSQL->execute();

        if($txtImagen!="")
        {
            $fecha = new  DateTime();
            $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
            $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

            move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);

            $SentenciaSQL= $conexion->prepare("SELECT ImagenLibro FROM libros WHERE ID=:ID");
            $SentenciaSQL->bindParam(':ID',$txtID);
            $SentenciaSQL->execute();
            $libro=$SentenciaSQL->fetch(PDO::FETCH_LAZY);

        if(isset($libro["ImagenLibro"]) && ($libro["ImagenLibro"]!="imagen.jpg"))
        {
            if(file_exists("../../img/".$libro["ImagenLibro"]))
            {
                unlink("../../img/".$libro["ImagenLibro"]);
            }
        }


            $SentenciaSQL= $conexion->prepare("UPDATE libros SET ImagenLibro=:ImagenLibro WHERE ID=:ID");
            $SentenciaSQL->bindParam(':ImagenLibro',$nombreArchivo);
            $SentenciaSQL->bindParam(':ID',$txtID);
            $SentenciaSQL->execute();
        }
        $SentenciaSQL= $conexion->prepare("UPDATE libros SET AutorLibro=:AutorLibro WHERE ID=:ID");
        $SentenciaSQL->bindParam(':AutorLibro',$txtAutor);
        $SentenciaSQL->bindParam(':ID',$txtID);
        $SentenciaSQL->execute();

        $SentenciaSQL= $conexion->prepare("UPDATE libros SET FechaPublicacionLibro=:FechaPublicacionLibro WHERE ID=:ID");
        $SentenciaSQL->bindParam(':FechaPublicacionLibro',$txtFecha);
        $SentenciaSQL->bindParam(':ID',$txtID);
        $SentenciaSQL->execute();

        $SentenciaSQL= $conexion->prepare("UPDATE libros SET EditorialLibro=:EditorialLibro WHERE ID=:ID");
        $SentenciaSQL->bindParam(':EditorialLibro',$txtEditorial);
        $SentenciaSQL->bindParam(':ID',$txtID);
        $SentenciaSQL->execute();

        $SentenciaSQL= $conexion->prepare("UPDATE libros SET DescripcionLibro=:DescripcionLibro WHERE ID=:ID");
        $SentenciaSQL->bindParam(':DescripcionLibro',$txtDescripcion);
        $SentenciaSQL->bindParam(':ID',$txtID);
        $SentenciaSQL->execute();
        header("Location:productos.php");

        break;
    case"Cancelar":
       header("Location:productos.php");
        break;
    case"Seleccionar":
        $SentenciaSQL= $conexion->prepare("SELECT * FROM libros WHERE ID=:ID");
        $SentenciaSQL->bindParam(':ID',$txtID);
        $SentenciaSQL->execute();
        $libro=$SentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtNombre=$libro['NombreLibro'];
        $txtImagen=$libro['ImagenLibro'];
        $txtAutor=$libro['AutorLibro'];
        $txtFecha=$libro['FechaPublicacionLibro'];
        $txtEditorial=$libro['EditorialLibro'];
        $txtDescripcion=$libro['DescripcionLibro'];

            break;
     case"Borrar":

        $SentenciaSQL= $conexion->prepare("SELECT ImagenLibro FROM libros WHERE ID=:ID");
        $SentenciaSQL->bindParam(':ID',$txtID);
        $SentenciaSQL->execute();
        $libro=$SentenciaSQL->fetch(PDO::FETCH_LAZY);

        if(isset($libro["ImagenLibro"]) && ($libro["ImagenLibro"]!="imagen.jpg"))
        {
            if(file_exists("../../img/".$libro["ImagenLibro"]))
            {
                unlink("../../img/".$libro["ImagenLibro"]);
            }
        }

        $SentenciaSQL= $conexion->prepare("DELETE FROM libros WHERE ID=:ID");
        $SentenciaSQL->bindParam(':ID',$txtID);
        $SentenciaSQL->execute();
        header("Location:productos.php");

            break;
}
$SentenciaSQL= $conexion->prepare("SELECT * FROM libros");
$SentenciaSQL->execute();
$listaLibros=$SentenciaSQL->fetchAll(PDO::FETCH_ASSOC);



?>
<div class="col-md-5">
  <div class="card">
    <div class="card-header">
        DATOS DEL LIBRO
    </div>
    <div class="card-body">
    <form method="POST" enctype="multipart/form-data"> 

<div class = "form-group">
<label for="txtID">ID:</label>
<input type="text" required readonly class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID"  placeholder="ID del libro">
</div>

<div class = "form-group">
<label for="txtNombre">Nombre:</label>
<input type="text" required class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre"  placeholder="Nombre del Libro">
</div>

<div class = "form-group">
<label for="txtNombre">Imagen:</label>
<br/>

<?php if($txtImagen!=""){ ?>

    <img class="img-thumbnail rounded" src="../../img/<?php echo $txtImagen;?>" width="150" alt="" srcset="">

<?php   }   ?>

<input type="file" required class="form-control"name="txtImagen" id="txtImagen"  placeholder="Imagen del Libro">
</div>

<div class = "form-group">
<label for="txtNombre">Autor:</label>
<input type="text" required class="form-control" value="<?php echo $txtAutor; ?>" name="txtAutor" id="txtAutor"  placeholder="Autor del Libro">
</div>

<div class = "form-group">
<label for="txtNombre">Fecha:</label>
<input type="datetime" required class="form-control" value="<?php echo $txtFecha; ?>" name="txtFecha" id="txtFecha"  placeholder="Fecha de publicacion del Libro">
</div>

<div class = "form-group">
<label for="txtNombre">Editorial:</label>
<input type="text" required class="form-control" value="<?php echo $txtEditorial; ?>" name="txtEditorial" id="txtEditorial"  placeholder="Editorial del Libro">
</div>

<div class = "form-group">
<label for="txtNombre">Descripcion:</label>
<input type="text" required class="form-control" value="<?php echo $txtDescripcion; ?>" name="txtDescripcion" id="txtDescripcion"  placeholder="Descripcion del Libro">
</div>

 <div class="btn-group" role="group" arial-label="">
    <button type="submit" name="accion" <?php echo ($accion=="Seleccionar")?"disabled":""; ?> value="Agregar" class="btn btn-outline-success">Agregar</button>
    <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> value="Modificar" class="btn btn-outline-danger">Modificar</button>
    <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> value="Cancelar" class="btn btn-outline-info">Cancelar</button>
</div>

</form>
    </div>


  </div>

</div>

<div class="col-md-7">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Imagen</th>
             <th>Autor</th>
            <th>Fecha</th>
            <th>Editorial</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php   foreach ($listaLibros as $libro) { ?>
        <tr>
            <td><?php echo $libro['ID'];?> </td>
            <td><?php echo $libro['NombreLibro'];?> </td>

            <td>


                <img src="../../img/<?php echo $libro['ImagenLibro'];?>" width="250" alt="" srcset="">
               

            </td>

            <td><?php echo $libro['AutorLibro'];?> </td>
            <td><?php echo $libro['FechaPublicacionLibro'];?> </td>
            <td><?php echo $libro['EditorialLibro'];?> </td>
            <td><?php echo $libro['DescripcionLibro'];?> </td>

            <td>
        <form method="post">
                <input type="hidden" name="txtID" id="txtID" value="<?php echo $libro['ID'];?>"/>
                <input type="submit" name=accion value="Seleccionar" class="btn btn-primary"/>
                <input type="submit" name=accion value="Borrar" class="btn btn-danger"/>
        </form>
        
        </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

</div>

<?php include("../template/pie.php");?>