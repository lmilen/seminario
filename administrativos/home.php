<?php include '../template/header.php' ?>

<div class="container card">
  <form class="p-4">
    <a class="btn btn-primary" href="../index.php" role="button">UDENAR</a>
    <a class="btn btn-primary" href="../prueba/index.php" role="button">Reporte de notas</a>
  </form>

  <div class="mt-5 text-primary text-center">
    <h1>Bienvenidos</h1>
  </div>
  <div class="d-grid">
    <input type="hidden" name="oculto" value="1">
    <a href="homestudent.php" class="btn btn-outline-warning m-3">Lista Estudiantes</a>
  </div>
  </form>
</div>
<div class="container card">
  <div class="d-grid">
    <input type="hidden" name="oculto" value="1">
    <a href="homesdocente.php" class="btn btn-outline-danger m-3">Lista Docentes</a>
  </div>
  </form>
</div>
<div class="container card">
  <div class="d-grid">
    <input type="hidden" name="oculto" value="1">
    <a href="homeadmin.php" class="btn btn-outline-success m-3">Lista administrativos</a>
  </div>
  <br>
  <div class="container card">
    <div class="d-grid">
      <input type="hidden" name="oculto" value="1">
      <a href="homesolicitud.php" class="btn btn-outline-success m-3">Solicitudes</a>
    </div>
  </div>
  </form>
</div>
<div class="container card">
  <div class="d-grid">
    <input type="hidden" name="oculto" value="1">
    <a href="homescomentario.php" class="btn btn-outline-danger m-3">Comentarios de proyectos - Docente</a>
  </div>
  </form>
</div>
<div class="container card">
  <div class="d-grid">
    <input type="hidden" name="oculto" value="1">
    <a href="asignacionpro.php" class="btn btn-outline-warning m-3">Proyectos</a>
  </div>
  </form>
  <br>
</div>
<?php include '../template/footer.php' ?>