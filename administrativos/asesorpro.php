<?php include '../template/header.php' ?>

<div class="container card">
      <form class="p-4">
      <a class="btn btn-primary" href="homesdocente.php" role="button">Regresar</a>  
      </form>

      <div class="container card">
        <div class="mt-5 text-primary text-center">
          <h1>Registar Administrativos</h1>
        </div>
        <form class="p-4" method="POST" action="registrarpro.php">
        <div class="mb-3">
            <label class="form-label">Identificacion Docente: </label>
            <input type="number" class="form-control" name="txtIdentificacion" autofocus required>
          </div>
          <div class="mb-3">
            <label class="form-label">Tipo de proyecto: </label>
            <input type="text" class="form-control" name="txtTipo" autofocus required>
          </div>
          <div class="mb-3">
            <label class="form-label">Aginado como asesor o jurado: </label>
            <input type="text" class="form-control" name="txtAse" autofocus required>
          </div>
          <div class="mb-3">
            <label class="form-label">Nombre proyecto: </label>
            <input type="text" class="form-control" name="txtNomp" autofocus required>
          </div>
          <div class="mb-3">
            <label class="form-label">Identificacion estudiante: </label>
            <input type="number" class="form-control" name="txtIdentest" autofocus required>
          </div>
          <div class="d-grid">
            <input type="hidden" name="oculto" value="1">
            <input type="submit" class="btn btn-primary" value="Registrar">
          </div>
        </form>
      </div>
<?php include '../template/footer.php' ?>