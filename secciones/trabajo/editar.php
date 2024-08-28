<?php
include("../../bd.php");

if(isset($_GET['txtID'])){
   $txtID=(isset($_GET['txtID']))?$_GET['txtID']:""; 

   $sentencia=$conexion->prepare("SELECT * FROM tbl_trabajo WHERE id=:id");
   $sentencia->bindParam(":id",$txtID);
   $sentencia->execute();
   $registro=$sentencia->fetch(PDO::FETCH_LAZY);
   $nombredeltrabajo=$registro["nombredeltrabajo"];
}
if($_POST){
    //recepciona el id
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $nombredeltrabajo=(isset($_POST["nombredeltrabajo"])?$_POST["nombredeltrabajo"]:"");
    //se recepciona el nombre del trabajo se hace la sentencia prepare
    $sentencia=$conexion->prepare(" UPDATE tbl_trabajo SET nombredeltrabajo=:nombredeltrabajo WHERE id=:id ");
    //se actualiza
    $sentencia->bindParam(":nombredeltrabajo",$nombredeltrabajo);
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $mensaje="Registro Actualizado";
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
              <label for="txtID" class="form-label">ID:</label>
              <input type="text"
              value="<?php echo $txtID;?>"
                class="form-control" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
            </div>

        <div class="mb-3">
          <label for="nombredeltrbajo" class="form-label">Nombre del Trabajo</label>
          <input type="text"
          value="<?php echo $nombredeltrabajo;?>"
            class="form-control" name="nombredeltrabajo" id="nombredeltrabajo" 
            aria-describedby="helpId" placeholder="Nombre del trabajo">
        </div>

        <button type="sumbit" class="btn btn-success">Editar</button>
        <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>



        </form>

    </div>
</div>


<?php include("../../templates/footer.php"); ?>