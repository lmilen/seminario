<?php include '../template/header.php' ?>

<div class="container card">
      <form class="p-4">
      <a class="btn btn-primary" href="homestudent.php" role="button">Regresa</a>  
      </form>

      <div class="container card">
        <div class="mt-3 text-primary text-center">
          <h1>Registrar Datos</h1>
        </div>
        <form class="p-4" method="POST" action="registrarase.php">
        <div class="mb-3">
            <label class="form-label">Identificacion Estudiante: </label>
            <input type="number" class="form-control" name="txtIdentificacion" autofocus required>
          </div>
          <div class="mb-3">
            <label class="form-label">Nombre Jurado: </label>
            <input type="text" class="form-control" name="txtJurado" autofocus required>
          </div>
          <div class="mb-3">
            <label class="form-label">Nombre Asesor: </label>
            <input type="text" class="form-control" name="txtAsesor">
          </div>
          <div class="mb-3">
            <label class="form-label">Comentarios: </label>
            <input type="text" class="form-control" name="txtAprobado">
          </div>
          <div class="d-grid">
            <input type="hidden" name="oculto" value="1">
            <input type="submit" class="btn btn-primary" value="Registrar">
          </div>
        </form>
      </div>
<?php include '../template/footer.php' ?>