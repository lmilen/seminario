<?php include '../template/header.php' ?>

<div class="container card">
      <form class="p-4" >
      <a class="btn btn-primary" href="homesdocente.php" role="button">Regresar</a>
      <a class="btn btn-primary" href="../pruebapdf/index.php" role="button">Reporte de notas</a>
      </form>

        <div class="mt-5 text-primary text-center">
          <h1>Registar Docente</h1>
        </div>
        <form class="p-4" method="POST" action="registrarcalif.php">
          <div class="mb-3">
            <label class="form-label">Nombre Proyecto: </label>
            <input type="text" class="form-control" name="txtNombre" autofocus required>
          </div>
          <div class="mb-3">
            <label class="form-label">Documento Estudiante: </label>
            <input type="number" class="form-control" name="txtDocumento" autofocus required>
          </div>
          <div class="mb-3">
            <label class="form-label">Calificacion: </label>
            <input type="number" class="form-control" name="txtNota" autofocus required>
          </div>
          <div class="d-grid">
            <input type="hidden" name="oculto" value="1">
            <input type="submit" class="btn btn-primary" value="Registrar">
          </div>
        </form>
      </div>
<?php include '../template/footer.php' ?>