<?php include '../template/header.php' ?>

<?php
include_once "../model/conexion.php";
$sentencia = $bd->query("select * from estudiante");
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
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'exito') {

      ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Exito!</strong> Proceso Realizado.
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
        <h1>Bienvenido <?php echo $name; ?></h1>
      </div>
      <div class="card">
        <did class="card-header">
          <div class="text-center">Información del estudiante
          </div>
        </did>
        <div class="p-4">
          <table class="table aling-middle">
            <thead>
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col" colspan="2">Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($persona as $dato) {
                if ($dato->documento == $_SESSION['usuario']) {
                  # code...
                  $id=$dato->codigo;
                  // echo $id;
              ?>
                  <tr>
                    <td scope="row"><?php echo $dato->nombre; ?></td>
                    <td><?php echo $dato->apellido; ?></td>

                    <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pencil-square"></i></a></td>
                    <td><a onclick="return confirm('¿Estas Seguro de eliminar esta cuenta?')" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash3-fill"></a></td>
                  </tr>
                  <thead>
              <tr>
                <th scope="col">Documento</th>
                <th scope="col">Programa</th>
                <th scope="col">Facultad</th>
               
              </tr>
            </thead>
            <tr>
                    <td scope="row"><?php echo $dato->documento; ?></td>
                    <td><?php echo $dato->programa; ?></td>
                    <td><?php echo $dato->facultad; ?></td>
                   
            </tr>
              <?php
                }
              }
              ?>
            </tbody>
          </table>

          <div class="text-center">
          SOLICITUD
          </div>
          
          <!--form class="p-4" method="POST" action="solicitud.php"  enctype="multipart/form-data">
            input class=" mb-3 w-100" type="number" name="ocultaidusuer" placeholder="digite su documento"
            <div class="mb-3">
            <input type="number" class="form-control" name="ocultaidusuer" placeholder="digite su documento">
            </div>

            <input type="text" class="mb-3 form-control" name="txtasunto" required placeholder="Asunto">
            <textarea type="text" class="form-control" name="txtsolicitud" rows="4" cols="50" 
            placeholder="Digite su solicitud en max 100 caracteres"></textarea>
            <div class="mb-3">
           
              <label for="formFile" class="form-label aling-middle">Documento grado</label>
              <input type="text" name="metodo" value="1" hidden>
              <input class="form-control" type="file" name="docsolicitud" required>
             

            </div-->
            <a class="btn btn-outline-success mt-3 w-100" href="../estudiante/indexsol.php?id=<?php echo $id; ?>" role="button">Hacer solicitud</a>
            <!-- <form class="p-4">
            <tr><th scope="col">Comentario Proyecto: </th></tr>
            <tr><td><?php echo $dato->opinion; ?></td></tr>
            </form> -->
            
            <form class="p-3" >
            <a class="btn btn-primary  mt-4 w-100" href="../estudiante/asignacion.php?id=<?php echo $id; ?>" role="button">Mirar Información del proyecto</a>
            </form>

          </form>

          <?php
          include "../model/conexion.php";
          $setencia = $bd->prepare("select * from solicitudes where solicitante =?;");
          $setencia->execute([$document]);
          $idjuradobd = $setencia;
          $persona2 = $setencia->fetch(PDO::FETCH_OBJ);
          if (isset($persona2->idjurado)) {
            $idjuradobd = $persona2->idjurado;
          }else{
            $idjuradobd = NULL;
          }
          if (isset($persona2->idasesor)) {
            $idasesorbd = $persona2->idasesor;
          }else{
            $idasesorbd = NULL;
          }
          if (isset($persona2->idjurado)) {
            $idsoli = $persona2->idsolicitud;
          }else{
            $idsoli = NULL;
          }
          //print_r($persona);
          ?>
          <?php
          include "../model/conexion.php";
          $setencia2 = $bd->prepare("select * from profesores where documento =?;");
          $setencia2->execute([$idjuradobd]);
          $persona3 = $setencia2->fetch(PDO::FETCH_OBJ);
          //print_r($persona);
          ?>
          <?php
          include "../model/conexion.php";
          $setencia3 = $bd->prepare("select * from profesores where documento =?;");
          $setencia3->execute([$idasesorbd]);
          $persona4 = $setencia3->fetch(PDO::FETCH_OBJ);
          //print_r($persona);
          ?>
          <?php
          include "../model/conexion.php";
          $setencia4 = $bd->prepare("select * from comentarios where idproyecto =?;");
          $setencia4->execute([$idsoli]);
          $persona5 = $setencia4->fetch(PDO::FETCH_OBJ);
          if (isset($persona5->comentario)) {
            $comentariobd = $persona5->comentario;
          }else{
            $comentariobd = NULL;
          }
          //print_r($persona);
          ?>
          <?php
          include "../model/conexion.php";
          $setencia5 = $bd->prepare("select * from solicitudes where idsolicitud =?;");
          $setencia5->execute([$idsoli]);
          $persona6 = $setencia5->fetch(PDO::FETCH_OBJ);
          if (isset($persona6->aprobado)) {
            $aprobadob = $persona6->aprobado;
          }else{
            $aprobadob = NULL;
          }
          //print_r($persona);
          ?>
        

        </div>
        <div class="card-footer">
          <a href="logout.php" class="btn btn-outline-danger w-100 ">Cerrar sesion<i class="bi bi-box-arrow-left"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include '../template/footer.php.' ?>
        