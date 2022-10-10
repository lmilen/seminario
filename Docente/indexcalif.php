<?php include '../template/header.php';
include_once "../model/conexion.php";
session_start();
$codigo = $_SESSION['codigo'];
$name = $_SESSION['nombre'];
if (!isset($_SESSION['usuario'])) {
  header('Location: index.html');
  exit();
}

$setencia2 = $bd->prepare("select * from profesores where documento =?;");
$setencia2->execute([$_SESSION['usuario']]);
$persona3 = $setencia2->fetch(PDO::FETCH_OBJ);
$idProyecto = $persona3->idProyecto;
$idProfesor = $persona3->codigo;


if ($idProyecto>0) {
?>

<div class="container card">
      <form class="p-4" >
      <a class="btn btn-primary" href="homesdocente.php" role="button">Regresar</a>
      <a class="btn btn-primary" href="../prueba/index.php" role="button">Reporte de notas</a>
      </form>

        <div class="mt-5 text-primary text-center">
          <h1>Registar Calificación</h1>
        </div>
        <form class="p-4" method="POST" action="registrocalificacion.php">
          <div class="mb-3">
            <!-- <label class="form-label">id Proyecto: </label> -->
            <input type="text" class="form-control" name="txtNombre" value="<?php echo $idProyecto ?>" hidden>
          </div>
          <div class="mb-3">
            <!-- <label class="form-label">IdAutor: </label> -->
            <input type="number" class="form-control" name="txtAutor" value="<?php echo $idProfesor ?>" hidden>
          </div>
          <div class="mb-3">
            <label class="form-label">Calificacion: </label>
            <input type="number" step="0.1" class="form-control" name="txtNota" autofocus required>
          </div>
          <div class="mb-3">
            <label class="form-label">Comentarios: </label>
            <input type="text" class="form-control" name="txtComentario" autofocus required>
          </div>
          <div class="d-grid">
            <input type="hidden" name="oculto" value="1">
            <input type="submit" class="btn btn-primary" value="Registrar">
          </div>
        </form>
        <br>
      </div>
      <?php }else{ ?>
        <div class="container card">
        <form class="p-4">
      <a class="btn btn-primary" href="../Docente/homesdocente.php" role="button">Regresar</a>  
      </form>
      <div class="container card">
      <div class="mt-5 text-primary text-center">
          <h1>No tiene asignado un proyecto</h1>
        </div>
      
      </div>  
<br>
      </div>  

      <?php } ?>
<?php include '../template/footer.php' ?>