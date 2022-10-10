<?php include '../template/header.php' ?>

<?php
include_once "../model/conexion.php";
include_once "../model/conect.php";
// $sentencia = $bd->query("select * from asesoresest");
// $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($persona);
?>

<?php
session_start();
$name = $_SESSION['nombre'];
$codigo = $_SESSION['codigo'];

if (!isset($_SESSION['usuario'])) {
  header('Location: index.html');
  exit();
}
// $sentencia = $bd->query("select * from profesores");
// $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
// print_r($persona);
$idest=0;
$msg="";
$comentario='No hay comentarios';

$sql = "SELECT * FROM solicitudes WHERE idDocente = '$codigo'";
$result = $mysqli->query($sql);
// print_r($result);
if($result->num_rows > 0){
  while ($row=$result->fetch_assoc() ) {
    $idest=$row['solicitante'];
    $nombredoc=$row['nombredoc'];
    $asunto=$row['asunto'];
    $calificacion=$row['calificacion'];
    $comentario=$row['comentarios'];
    $url=$row['url'];
    
    $solicitud=$row['solicitud'];
    $idsolicitud=$row['idsolicitud'];
  }
  $sql2 = "SELECT * FROM estudiante WHERE codigo = '$idest'";
  $estudiante = $mysqli->query($sql2);
  while ($row=$estudiante->fetch_assoc() ) {
    $nombre=$row['nombre'].' '.$row['apellido'];
    $programa=$row['programa'].' Facultad: '.$row['facultad'] ;
    $correo=$row['correo'];    
  }
  
}else {
  # code...no hay proyecto
  $msg="No hay un proyecto asignado";
}

?>

<div class="container card mt-5">
  <div class="row justify-content-center">
    <div class="col-md-7">
      <!--inicio alerta -->


      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {

      ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> Rellena todos los campos.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {

      ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Registrado!</strong> Se agregaron los datos.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {

      ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> Vuelve a intentar.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {

      ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Editado!</strong> Datos Actualizados.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {

      ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Eliminado!</strong> Datos Eliminados.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>
      <!--fin alerta -->
      <div class="mb-3 text-primary text-center">
        <h1>Bienvenidos <?php ?></h1>
      </div>

      <div class="card">
        <div class="card-header">
          <div class="text-center">
            Proyecto Asignado
          </div>
        </div>
        <?php if($result->num_rows > 0){ ?>
          <div class="text-center">Datos del estudiante y proyecto</div>
        <div class="p-6 table-responsive">
          <table class="table aling-middle">
            <thead>
              <tr>
                <th scope="col">Estudiante</th>
                <th scope="col">Programa - Facultad</th>
                <th scope="col">Correo</th>
                <th scope="col">Proyecto</th>
                <th scope="col">Asunto</th>
                <th scope="col">Calificación</th>
              </tr>
            </thead>
            <tbody>
                  <tr>
                    <td scope="row"><?php echo $nombre; ?></td>
                    <td><?php echo $programa; ?></td>
                    <td><?php echo $correo; ?></td>
                    <td><?php echo $nombredoc; ?></td>
                    <td><?php echo $asunto; ?></td>
                    <td><?php echo $calificacion; ?></td>
                  </tr>
            </tbody>
          </table>
        </div>
        <div class="mb-3 text-primary text-center">
          <h3>Comentarios </h3>
        </div>
        <div class="card-body">
          <div class="text-center">
          <?php echo $comentario; ?>
          </div>
        </div>
        <?php if($url!=NULL || $url!=""){ ?>
        <div class="mb-3 text-primary text-center">
          <h3>Puedes visualizar el documento en el enlace:  </h3>
        </div>
        <div class="card-body">
          <div class="text-center">
            <a href="<?php echo $url; ?>" target="_blank" rel="noopener noreferrer">Proyecto asignado</a>
          
          </div>
        </div>
        <?php } }else{ ?>
          <div class="text-center">
            No tienes Proyecto Asignado
          </div>
        <?php } ?>

        <div class="card-footer">
            <a href="homesdocente.php" class="btn btn-outline-danger w-100 ">Regresar <i class="bi bi-box-arrow-left"></i></a>
          </div>
      </div>
    </div>
  </div>
  <br>
</div>
<br>

<?php include '../template/footer.php.' ?>