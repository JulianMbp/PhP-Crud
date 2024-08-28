<?php
include("../../bd.php");

if($_POST){
  $primernombre=(isset($_POST["primernombre"])?$_POST["primernombre"]:"");
  $segundonombre=(isset($_POST["segundonombre"])?$_POST["segundonombre"]:"");
  $primerapellido=(isset($_POST["primerapellido"])?$_POST["primerapellido"]:"");
  $segundoapellido=(isset($_POST["segundoapellido"])?$_POST["segundoapellido"]:"");
  $identificacion=(isset($_POST["identificacion"])?$_POST["identificacion"]:"");

  $idtrabajo=(isset($_POST["idtrabajo"])?$_POST["idtrabajo"]:"");
  $grado=(isset($_POST["grado"])?$_POST["grado"]:"");
  $horas=(isset($_POST["horas"])?$_POST["horas"]:"");

  $sentencia=$conexion->prepare("INSERT INTO `tbl_empleados` (`id`, `primernombre`, `segundonombre`, `primerapellido`, `segundoapellido`, `identificacion`, `idtrabajo`, `grado`,`horas`) 
  VALUES (NULL,:primernombre,:segundonombre, :primerapellido,:segundoapellido,:identificacion,:idtrabajo,:grado,:horas);");


$sentencia->bindParam(":primernombre",$primernombre);
$sentencia->bindParam(":segundonombre",$segundonombre);
$sentencia->bindParam(":primerapellido",$primerapellido);
$sentencia->bindParam(":segundoapellido",$segundoapellido);
$sentencia->bindParam(":identificacion",$identificacion);
$sentencia->bindParam(":idtrabajo",$idtrabajo);
$sentencia->bindParam("grado",$grado);
$sentencia->bindParam("horas",$horas);
$sentencia->execute();
$mensaje="Registro Agregado";
   header("Location:index.php?mensaje=".$mensaje);
}

$sentencia=$conexion->prepare("SELECT * FROM `tbl_trabajo`");
$sentencia->execute();
$lista_tbl_trabajo=$sentencia->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("../../templates/header.php"); ?>
<br/>
<div class="card">
    <div class="card-header">
        Datos del Estudiante
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data" >

        <div class="mb-3">
          <label for="primernombre" class="form-label">Primer Nombre</label>
          <input type="text"
            class="form-control" name="primernombre" id="primernombre" aria-describedby="helpId" placeholder="Primer nombre">
        </div>
        <div class="mb-3">
          <label for="segundonombre" class="form-label">Segundo Nombre</label>
          <input type="text"
            class="form-control" name="segundonombre" id="segundonombre" aria-describedby="helpId" placeholder="Segundo nombre">
        </div>
        <div class="mb-3">
          <label for="primerapellido" class="form-label">Primer Apellido</label>
          <input type="text"   
            class="form-control" name="primerapellido" id="primerapellido" aria-describedby="helpId" placeholder="Primer apellido">
        </div>
        <div class="mb-3">
          <label for="segundoapellido" class="form-label">Segundo Apellido</label>
          <input type="text"
            class="form-control" name="segundoapellido" id="segundoapellido" aria-describedby="helpId" placeholder="Segundo Apellido">
        </div>
        <div class="mb-3">
          <label for="identificacion" class="form-label">Identificacion</label>
          <input type="text"
            class="form-control" name="identificacion" id="identificacion" aria-describedby="helpId" placeholder="Ingrese su numero de indentificacion">
        </div>
        <div class="mb-3">
            <label for="idtrabajo" class="form-label">Trabajo</label>            
            <select class="form-select form-select-sm" name="idtrabajo" id="idtrabajo">
            <?php foreach ($lista_tbl_trabajo as $registro) {  ?>
                <option value="<?php echo $registro['id']?>">
                <?php echo $registro['nombredeltrabajo']?> </option>
                <?php } ?> 
            </select>

        </div>

        <div class="mb-3">
          <label for="grado" class="form-label">Grado</label>
          <input type="text"   
            class="form-control" name="grado" id="grado" aria-describedby="helpId" placeholder="Escribe en LETRAS tu grado">
        </div>
       

        <div class="mb-3">
          <label for="horas" class="form-label">Horas completadas</label>
          <input type="text"   
            class="form-control" name="horas" id="horas" aria-describedby="helpId" placeholder="Escriba el numero de horas certificadas del estudiante">
        </div>

        <button type="sumbit" class="btn btn-success btn-block">Agregar Registro</button>
        <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
        
        </form>
    </div>
   
</div>




<?php include("../../templates/footer.php"); ?>