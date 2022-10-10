<?php include '../template/header.php' ?>

      <div class="container card">
        <div class="mt-5 text-primary text-center">
          <h1>Ingreso estudiante</h1>
        </div>
        <form class="p-2" method="POST" action="login.php">
          <div class="mb-3">
            <label class="form-label">Documento: </label>
            <input type="number" class="form-control" name="user" autofocus required>
          </div>
          <div class="mb-3">
            <label class="form-label">Contraseña: </label>
            <input type="password" class="form-control" name="pass" autofocus required>
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Ingresar Cuenta</button>
          </div>
        </form>
      </div>
<?php include '../template/footer.php' ?>