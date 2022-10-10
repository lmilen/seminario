<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Trabajo de grado - Udenar</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="css/style.css">


    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
    <!-- jQuery -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Your custom scripts (optional) -->
    <script type="text/javascript"></script>
</head>

<body background="imagenes/Fondo.jpg">

    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark  scrolling-navbar">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
              <a class="nav-link" href="index.php"><strong> UDENAR</strong></a>
              </li>

              <li class="nav-item ">
                <a class="nav-link" href="estudiante.php"><strong> ESTUDIANTES</strong></a>
              </li>

              <li class="nav-item ">
              <a class="nav-link" href="docente.php"><strong> DOCENTES</strong></a>
              </li>

              <li class="nav-item ">
              <a class="nav-link" href="administrativo.php"><strong> ADMINISTRATIVOS</strong></a>
              </li>

            </ul>
            <ul class="navbar-nav nav-flex-icons">
              <li class="nav-item">
                <a class="nav-link"><i class="fab fa-facebook-f"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link"><i class="fab fa-instagram"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>

    <div align="center">
    <br><br>
		<img src="imagenes/Logo.png">
    </div>

    <div class="container">
        <div class="card-body">
            <div style="color: white; background: rgba(4, 5, 5, 0.349)">
                <form id="formulario" action="./procesosest.php" method="POST">
                    <!-- Material input -->
                    <br>
                    <h2 class="card-title font-weight-bold"; style="color: white"; align="center"><a>REGISTRAR DATOS ESTUDIANTES</a></h2>
                
                    <div class="col">
                    Nombre Usuario
                                <input style="color: black;" type="text" id="nombreest" name="nombreest" class="form-control"  placeholder="Nombre" required >
                                <label for="nombreest"></label>      
                    </div>
        
                    <div class="col">
                    Apellido Usuario
                            <input style="color: black" type="text" id="apellidoest" name="apellidoest" class="form-control" placeholder="Apellido" required>
                            <label for="apellidoest"> </label>      
                    </div>

                    <div class="col">
                    Programa De Pregrado
                                <input style="color: black" type="text" id="progest" name="progest" class="form-control" placeholder="Programa De Pregrado" required>
                                <label for="progest"></label>
                    </div>

                    <div class="col">
                    Facultad
                                <input style="color: black" type="text" id="falest" name="falest" class="form-control" placeholder="Facultad" required>
                                <label for="falest"></label>
                    </div>

                    <div class="col">
                    Codigo
                                <input style="color: black" type="number" id="codest" name="codest" class="form-control" placeholder="Codigo Estudiantil" required>
                                <label for="codest"></label>
                    </div>
                    
                    <div class="col"> 
                    Correo
                                <input style="color: black" type="email" id="correoest" name="correoest" class="form-control" placeholder="Correo" required>
                                <label for="correoest"></label>
                    </div>
                    
                    <div class="col">
                    Contraseña
                                <input style="color: black" type="password" id="contest" name="contest" class="form-control" placeholder="Contraseña" required>
                                <label for="contest"></label>
                    </div>

                    <div class="col">
                    Confirmar Contraseña
                                <input style="color: black" type="password" id="contestcon" name="contestcon" class="form-control" placeholder="Confirmar Contraseña" required>
                                <label for="contestcon"></label>
                    </div>

                    <div class="col">
                    <div class="form-row">
                       <div class="col">
                            <label>Seleccione Tipo De Usuario </label>
                            <select class="browser-default custom-select" name="tipousu"> 
                                <option value="" disabled selected>Usuario</option>
                                <option value="estudiante" id="estudiante">Estudiante</option>
                                <option value="docente" id="docente">Docente</option>
                                <option value="administrativo" id="administrativo">Administrativo</option>
                            </select>
                        </div>

                    <div class="col">
                    <h6>Si desea dejarnos un comentario, por favor, escríbalo a continuación.</h6>
                        <input style="color: black" style="color: white" type="text" id="opinionest" name="opinionest" class="form-control" placeholder="Opinion">
                        <label for="opinionest"></label>
                    </div>
     
                    </div>
                    <br>
                    <div align="center" >
                    <button class="btn btn-primary" id="Enviar" >REGISTRAR</button> <br><br>
                    </div>               

                </form>
            </div>  
        </div>
    </div>
    <div id="respuesta"></div>
</body>

<script>
    $('Enviar').click(function()
    {
        $.ajax(
        {
          url: 'procesosest.php',
          type: 'POST',
          data: $('#formulario').serialize(),
          success: function(res)
          {
              $('#respuesta').html(res);
          }
        });
    });
</script>
</div>
<!-- Footer -->
<footer class="page-footer font-small white pt-4">
    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">
        
        <div align="left">
               <img src="imagenes/udenar.png" width="50">
            </div>
    </div>
    <br>
    <div class="footer-copyright text-left py-3"; style="color: black"> © Derechos Reservados 2022 <br>
    QASOLUTIONS
        <a href="https://mdbootstrap.com/"></a>
    </div>

</footer>
<!-- Footer -->

</html>