<?php include 'template/header.php' ?>

<?php
  include_once "model/conexion2.php";
  //print_r($persona);
?>

<div class="container card mt-5">
  <div class="row justify-content-center">
    <div class="col-md-7">
      <!--inicio alerta -->


      <?php
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
      
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Rellena todos los campos.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>   
      <?php
          }     
      ?>

      <?php
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
      
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Registrado!</strong> Se agregaron los datos.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>   
      <?php
          }     
      ?>

      <?php
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
      
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Vuelve a intentar.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>   
      <?php
          }     
      ?>

      <?php
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
      
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Editado!</strong> Datos Actualizados.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>   
      <?php
          }     
      ?>
      
      <?php
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
      
      ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Eliminado!</strong> Datos Eliminados.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>   
      <?php
          }     
      ?>
      <!--fin alerta -->
      <div class="col-md-5">
      <div class="card">
        <div class="card-header">
          Ingreso administrativos:
        </div>
        <form class="p-2" method="POST" action="login.php">
          <div class="mb-3">
            <label class="form-label">Documento: </label>
            <input type="text" class="form-control" name="user" autofocus required>
          </div>
          <div class="mb-3">
            <label class="form-label">Contraseña: </label>
            <input type="password" class="form-control" name="pass" autofocus required>
          </div>
          <div class="d-grid">
            <input type="hidden" name="oculto" value="1">
            <input type="submit" class="btn btn-primary" value="Ingresar">
          </div>
        </form>
      </div>
    </div>
    </div>
    <div class="col-md-5">
      <div class="card">
        <div class="card-header">
          Registar datos administrativos:
        </div>
        <form class="p-4" method="POST" action="registrar.php">
          <div class="mb-3">
            <label class="form-label">Nombre: </label>
            <input type="text" class="form-control" name="txtNombre" autofocus required>
          </div>
          <div class="mb-3">
            <label class="form-label">Documento: </label>
            <input type="text" class="form-control" name="txtDocumento" autofocus required>
          </div>
          <div class="mb-3">
            <label class="form-label">Contraseña: </label>
            <input type="password" class="form-control" name="txtPass" autofocus required>
          </div>
          <div class="d-grid">
            <input type="hidden" name="oculto" value="1">
            <input type="submit" class="btn btn-primary" value="Registrar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include 'template/footer.php.' ?>