<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Infomacion Registro </title>
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

    <?php
            $nombreadm = $_POST["nombreadm"];
            $apellidoadm = $_POST["apellidoadm"];
            $empadm = $_POST["empadm"];
            $codadm = $_POST["codadm"];
            $correoadm = $_POST["correoadm"]; 
            $contadm = $_POST["contadm"];
            $contadmcon = $_POST["contadmcon"];      
            $tipousu= $_POST["tipousu"]; 
    ?>

</body>
<br><br>

    <h3 align="center" style="color: white;">  INFORMACIÓN REGISTRO ADMINISTRATIVOS </h3> 
    <br>
    <div class="container">
        <div class="card-body">
                <div class="form-row">
                    <div class="col">
                        <div class="card booking-card">
                            <div class="view overlay">
                                <img class="card-img-top" src="imagenes/factura.jpg" alt="Card image cap">
                                <div class="mask rgba-white-slight"></div>
                            </div>
                            <div class="card-body">
                                
                                <div class="alert alert-dark" role="alert">Nombres:
                                    <?php echo $nombreadm ?>
                                </div>
                                
                                <div class="alert alert-dark" role="alert"> Apellidos:
                                    <?php echo $apellidoadm ?>
                                </div>
                                
                                <div class="alert alert-dark" role="alert"> Cargo:
                                    <?php echo $empadm?>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                
                    <div class="col">
                        <div class="card booking-card">
                            <div class="view overlay">
                                <img class="card-img-top" src="imagenes/factura.jpg" alt="Card image cap">
                                <div class="mask rgba-white-slight"></div>
                            </div>
                            <div class="card-body" >
                                
                                <div class="alert alert-dark" role="alert"> Codigo:
                                    <?php  echo $codadm ?> 
                                </div>
                                
                                <div class="alert alert-dark" role="alert"> Correo:
                                    <?php  echo $correoadm ?> 
                                </div>
                                
                                <div class="alert alert-dark" role="alert"> Tipo De Usuario:
                                    <?php  echo $tipousu ?>    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    
    <div class="container" align="center">
        <div class="card booking-card">

            <?php 
                echo "Gracias Por Registrarte, ".$_POST['nombreadm']." ".$_POST['apellidoadm'].".";
            ?>
            <?php
                echo "Si tienes duda comunicate con nosotros";
            ?>
        </div>
    </div>
</body>

<br><br>
<footer class="page-footer font-small white pt-4">
    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">
           
            <div class="input-group mb-3"; style="color: black">
                <!-- Content -->
                <h5>Contactanos
                <br>Conmutador: (602)7244309 <br>
                Extensión 2005 <br>
                Línea Gratuita Nacional de Atención al Usuario 018000957071</h5> <br>
            </div> 

            <div align="left">
               <img src="imagenes/udenar.png" width="120">
            </div>
    </div>
    <br>
    <div class="footer-copyright text-left py-3"; style="color: black"> © Derechos Reservados 2022 <br>
    QASOLUTIONS
        <a href="https://mdbootstrap.com/"></a>
    </div>

    <!-- Copyright -->
</footer>

<html>


