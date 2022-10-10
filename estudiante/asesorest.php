<?php include '../template/header.php' ?>

<?php
include_once "../model/conexion.php";
$sentencia = $bd->query("select * from solicitestud");
$persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($persona);
?>

<?php
session_start();
$name = $_SESSION['nombre'];
$document = $_SESSION['usuario'];
if (!isset($_SESSION['usuario'])) {
  header('Location: index.html');
  exit();
}
?>

<div class="container mt-5  card">
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

      <!--fin alerta -->
      <div class="mb-3 text-primary text-center">
        <h1>Bienvenidos <?php ?></h1>
      </div>
      <div class="card">
        <did class="card-header">
          <div class="text-center">
            Datos
          </div>
        </did>
        <div class="p-4">
          <table class="table aling-middle">
            <thead>
              <tr>
                <th scope="col">Identificacion</th>
                <th scope="col">Jurado</th>
                <th scope="col">Asesor</th>
                <th scope="col">Comentarios</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($persona as $dato) {
                if ($dato->identificacion == $_SESSION['usuario']) {
                  # code...
              ?>
                  <tr>
                    <td scope="row"><?php echo $dato->identificacion; ?></td>
                    <td><?php echo $dato->jurado; ?></td>
                    <td scope="row"><?php echo $dato->asesor; ?></td>
                    <td><?php echo $dato->aprobado; ?></td>
                  </tr>
                  
              <?php
                }
              }
              ?>
            </tbody>
          </table>
        
          <div class="text-center">
          

          </form>

        </div>
        <div class="card-footer">
          <a href="homestudent.php" class="btn btn-outline-danger w-100 ">Regresar o Salir <i class="bi bi-box-arrow-left"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include '../template/footer.php.' ?>