<?php
include("../../bd.php");
if(isset( $_GET['txtID'] )){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("SELECT * FROM tbl_empleados WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    $primernombre=$registro["primernombre"];
    $segundonombre=$registro["segundonombre"];
    $primerapellido=$registro["primerapellido"];
    $segundoapellido=$registro["segundoapellido"];
    $identificacion=$registro["identificacion"];
    $idtrabajo=$registro["idtrabajo"];
    $grado=$registro["grado"];
    $horas=$registro["horas"];
    
    $sentencia=$conexion->prepare("SELECT * FROM `tbl_trabajo`");
    $sentencia->execute();
    $lista_tbl_trabajo=$sentencia->fetchAll(PDO::FETCH_ASSOC);
}
if($_POST){

  $txtID=(isset($_POST['txtID'])?$_POST['txtID']:"");
  $primernombre=(isset($_POST["primernombre"])?$_POST["primernombre"]:"");
  $segundonombre=(isset($_POST["segundonombre"])?$_POST["segundonombre"]:"");
  $primerapellido=(isset($_POST["primerapellido"])?$_POST["primerapellido"]:"");
  $segundoapellido=(isset($_POST["segundoapellido"])?$_POST["segundoapellido"]:"");
  $idtrabajo=(isset($_POST["idtrabajo"])?$_POST["idtrabajo"]:"");
  $grado=(isset($_POST["grado"])?$_POST["grado"]:"");
  $horas=(isset($_POST["horas"])?$_POST["horas"]:"");
  

  $sentencia=$conexion->prepare("
  UPDATE tbl_empleados
  SET
    primernombre=:primernombre,
    segundonombre=:segundonombre,
    primerapellido=:primerapellido,
    segundoapellido=:segundoapellido,
    idtrabajo=:idtrabajo,
    grado=:grado,
    horas=:horas
  WHERE id=:id
  ");

  $sentencia->bindParam(":primernombre",$primernombre);
  $sentencia->bindParam(":segundonombre",$segundonombre);
  $sentencia->bindParam(":primerapellido",$primerapellido);
  $sentencia->bindParam(":segundoapellido",$segundoapellido);
  $sentencia->bindParam(":idtrabajo",$idtrabajo);
  $sentencia->bindParam("grado",$grado);
  $sentencia->bindParam("horas",$horas);
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
        Datos del Estudiante
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data" >

        <div class="mb-3">
              <label for="txtID" class="form-label">ID:</label>
              <input type="text"
              value="<?php echo $txtID;?>"
                class="form-control" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
        </div>

        <div class="mb-3">
          <label for="primernombre" class="form-label">Primer Nombre</label>
          <input type="text"
          value="<?php echo $primernombre;?>"
            class="form-control" name="primernombre" id="primernombre" aria-describedby="helpId" placeholder="Primer nombre">
        </div>
        <div class="mb-3">
          <label for="segundonombre" class="form-label">Segundo Nombre</label>
          <input type="text"
          value="<?php echo $segundonombre;?>"
            class="form-control" name="segundonombre" id="segundonombre" aria-describedby="helpId" placeholder="Segundo nombre">
        </div>
        <div class="mb-3">
          <label for="primerapellido" class="form-label">Primer Apellido</label>
          <input type="text" 
          value="<?php echo $primerapellido;?>"  
            class="form-control" name="primerapellido" id="primerapellido" aria-describedby="helpId" placeholder="Primer apellido">
        </div>
        <div class="mb-3">
          <label for="segundoapellido" class="form-label">Segundo Apellido</label>
          <input type="text"
          value="<?php echo $segundoapellido;?>"
            class="form-control" name="segundoapellido" id="segundoapellido" aria-describedby="helpId" placeholder="Segundo Apellido">
        </div>
        <div class="mb-3">
          <label for="identificacion" class="form-label">Identificacion</label>
          <input type="text"
          value="<?php echo $identificacion;?>"
            class="form-control" name="identificacion" id="identificacion" aria-describedby="helpId" placeholder="Ingrese su numero de indentificacion">
        </div>
        <div class="mb-3">
            <label for="idtrabajo" class="form-label">Trabajo</label>
         
            <select class="form-select form-select-sm" name="idtrabajo" id="idtrabajo">
            <?php foreach ($lista_tbl_trabajo as $registro) {  ?>

                <option <?php echo ($idtrabajo== $registro['id'])?"selected":"";?> value="<?php echo $registro['id']?>">
                <?php echo $registro['nombredeltrabajo']?> </option>
                <?php } ?> 
            </select>

        </div>
        <div class="mb-3">
          <label for="grado" class="form-label">Grado</label>
          <input type="text"  
          value="<?php echo $grado;?>"
            class="form-control" name="grado" id="grado" aria-describedby="helpId" placeholder="Escribe en LETRAS tu grado">
        </div>

        <div class="mb-3">
          <label for="horas" class="form-label">horas</label>
          <input type="text"  
          value="<?php echo $horas;?>"
            class="form-control" name="horas" id="horas" aria-describedby="helpId" placeholder="Escriba el numero de horas certificadas del estudiante">
        </div>

        <button type="sumbit" class="btn btn-success">Actualizar Registro</button>
        <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
        
        </form>
    </div>


<?php include("../../templates/footer.php"); ?>