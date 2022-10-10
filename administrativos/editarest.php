<?php include '../template/header.php'?>

<?php
    if(!isset($_GET['codigo'])){
      header('Location: home.php?mensaje=error');
      exit();
    }      
    include_once '../model/conexion.php';
    $codigo = $_GET['codigo'];
    $sentecia = $bd->prepare("select * from estudiante where codigo =?;");
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
        <form class="p-4" method="POST" action="editarestProceso.php">
          <div class="mb-3">
            <label class="form-label">Nombre: </label>
            <input type="text" class="form-control" name="txtNombre" required value="<?php echo $persona->nombre; ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Apellido: </label>
            <input type="text" class="form-control" name="txtApellido" required value="<?php echo $persona->apellido; ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Programa: </label>
            <input type="text" class="form-control" name="txtPrograma" required value="<?php echo $persona->programa; ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Facultad: </label>
            <input type="text" class="form-control" name="txtFacultad" required value="<?php echo $persona->facultad; ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Documento: </label>
            <input type="number" class="form-control" name="txtDocumento" required value="<?php echo $persona->documento; ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Correo: </label>
            <input type="email" class="form-control" name="txtCorreo" required value="<?php echo $persona->correo; ?>">
          </div>  
          <div class="mb-3">
            <label class="form-label">Contraseña: </label>
            <input type="text" class="form-control" name="txtPass" required value="<?php echo $persona->contra; ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Comentario: </label>
            <input type="text" class="form-control" name="txtOpinion" required value="<?php echo $persona->opinion; ?>">
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