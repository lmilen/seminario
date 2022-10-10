<?php include '../template/header.php'?>

<?php
    if(!isset($_GET['codigo'])){
      header('Location: home.php?mensaje=error');
      exit();
    }      
    include_once '../model/conexion.php';
    $codigo = $_GET['codigo'];
    $sentecia = $bd->prepare("select * from solicitestud where codigo =?;");
    $sentecia->execute([$codigo]);
    $persona = $sentecia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>
 
 <div class="container card mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
    <div class="card">
        <div class="card-header">
          Editar datos:
        </div>
        <form class="p-4" method="POST" action="editaraseProceso.php">
          <div class="mb-3">
            <label class="form-label">Identificacion Estudiante:: </label>
            <input type="number" class="form-control" name="txtIdentificacion" required value="<?php echo $persona->identificacion; ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Nombre Jurado:: </label>
            <input type="text" class="form-control" name="txtJurado" required value="<?php echo $persona->jurado; ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Nombre Asesor: </label>
            <input type="text" class="form-control" name="txtPrograma" required value="<?php echo $persona->programa; ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Comentarios: </label>
            <input type="text" class="form-control" name="txtFacultad" required value="<?php echo $persona->facultad; ?>">
          </div>
          <div class="d-grid">
            <input type="hidden" name="codigo" value="<?php echo $persona->codigo; ?>">
            <input type="submit" class="btn btn-primary" value="Guardar Cambios">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include '../template/footer.php.'?>