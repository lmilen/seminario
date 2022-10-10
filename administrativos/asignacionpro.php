<?php include '../template/header.php' ?>

<form class="p-4" >
<a class="btn btn-primary" href="home.php" role="button">Administrativos</a>
</form>

<?php
include_once "../model/conexion.php";
$idpro=0;
$sentencia = $bd->query("select * from solicitudes");
$persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($persona);
?>

<?php
session_start();
$name = $_SESSION['nombre'];
if (!isset($_SESSION['usuario'])) {
  header('Location: index.html');
  exit();
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
        <did class="card-header">
          <div class="text-center">
            Listado de proyectos
          </div>
        </did>
        <div class="p-6">
          <table class="table aling-middle">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre Proyecto</th>
                <th scope="col">Asunto</th>
                <th scope="col">Nombre del estudiante</th>
                <th scope="col">Nombre del docente</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($persona as $dato) {
                $idest=$dato->solicitante;
                
                $idpro=$dato->idDocente;
                

              ?>
                  <tr>
                    <td scope="row"><?php echo $dato->solicitante; ?></td>
                    <td><?php echo $dato->nombredoc; ?></td>
                    <td><?php echo $dato->asunto; ?></td>
                    <?php 
    if ($idest>0) {$est = $bd->query("select * from estudiante where codigo=$idest");
$estudiante = $est->fetchAll(PDO::FETCH_OBJ);

foreach ($estudiante as $dato2) {


?><td><?php echo $dato2->nombre.' '.$dato2->apellido; ?></td>
                    <?php }} 
    if ($idpro>0) {
      $profesor = $bd->query("select * from profesores where codigo=$idpro");
$persona3 = $profesor->fetchAll(PDO::FETCH_OBJ);
    

foreach ($persona3 as $dato3) {


?><td><?php echo $dato3->nombre.' '.$dato3->apellido; ?></td>
                    <?php }} 
              }
              ?>
            </tbody>
          </table>
        </div>
        <div class="card-footer">
            <a href="logout.php" class="btn btn-outline-danger w-100 ">Cerrar sesion <i class="bi bi-box-arrow-left"></i></a>
          </div>
      </div>
    </div>
  </div>
</div>

<?php include '../template/footer.php.' ?>