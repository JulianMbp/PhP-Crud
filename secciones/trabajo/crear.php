<?php
include("../../bd.php");

if($_POST){
print_r($_POST);

    //REcolector de datos del metodo post
    $nombredeltrabajo=(isset($_POST["nombredeltrabajo"])?$_POST["nombredeltrabajo"]:"");
    //preparar insercion
    $sentencia=$conexion->prepare("INSERT INTO tbl_trabajo(id,nombredeltrabajo)
                VALUES (null, :nombredeltrabajo)");
     //ASignar valores que tienen del metodo post (los que vienen del formulario)
    $sentencia->bindParam(":nombredeltrabajo",$nombredeltrabajo);
    $sentencia->execute();
    $mensaje="Registro Agregado";
   header("Location:index.php?mensaje=".$mensaje);
}
?>
<?php include("../../templates/header.php"); ?>

<br/>
<div class="card">
    <div class="card-header">
        Trabajo
    </div>
    <div class="card-body">

        <form action="" method="post" enctype="multipart/form-data">

        <div class="mb-3">
          <label for="nombredeltrabajo" class="form-label">Nomnbre del Trabajo</label>
          <input type="text"
            class="form-control" name="nombredeltrabajo" id="nombredeltrabajo" aria-describedby="helpId" placeholder="Nombre del trabajo">
        </div>

        <button type="sumbit" class="btn btn-success">Agregar</button>
        <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>



        </form>

    </div>
</div>

<?php include("../../templates/footer.php"); ?>