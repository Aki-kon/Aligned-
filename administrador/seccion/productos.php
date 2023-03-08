<?php include("../template/cabecera.php");?>
<?php 
print_r($_POST)
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
<input type="text" class="form-control"name="txtID" id="txtID"  placeholder="ID">
</div>

<div class = "form-group">
<label for="txtNombre">Nombre:</label>
<input type="text" class="form-control"name="txtNombre" id="txtNombre"  placeholder="Nombre del Libro">
</div>

<div class = "form-group">
<label for="txtNombre">Imagen:</label>
<input type="file" class="form-control"name="txtImagen" id="txtImagen"  placeholder="Nombre del Libro">
</div>
 <div class="btn-group" role="group" arial-label="">
    <button type="button" name="accion" class="btn btn-outline-success">Agregar</button>
    <button type="button" name="accion" class="btn btn-outline-danger">Modificar</button>
    <button type="button" name="accion" class="btn btn-outline-info">Cancelar</button>
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
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>2</td>
            <td>Aprende PHP</td>
            <td>imagen.jpg</td>
            <td>Seleccionar|Borrar</td>
        </tr>
    </tbody>
</table>

</div>

<?php include("../template/pie.php");?>