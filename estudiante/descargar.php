<?php include '../template/header.php';

include_once "../model/conexion.php";
include_once "../model/conect.php";

$Id_Usuario=$_GET['id'];
$url="";
$sql = "SELECT * FROM solicitudes WHERE solicitante = '$Id_Usuario'";
$result = $mysqli->query($sql);
// print_r($result);
if($result->num_rows > 0){
  while ($row=$result->fetch_assoc() ) {
    $url=$row['url'];
  }
}

 ?>

<div class="container card">
	<form class="p-4">
		<a class="btn btn-primary" href="indexsol.php?id=<?php echo $Id_Usuario ?>" role="button">Regresar</a>
	</form>


	<div class="mt-3 text-primary text-center">
		<h1>Registrar Documento De Solicitud</h1>
	</div>

	<?php
$conn=new PDO('mysql:host=localhost; dbname=dbsem2', 'root', ''); //or die(mysql_error());
if(isset($_POST['submit'])!=""){
	//////
	$name=$_FILES['file']['name'];
	if($_FILES["file"]["error"]>0){
		$error="No se seleccionó un documento ";
	}else{////creamos una carpeta para guardar los documentos que suba el estudiante
		$path = '../upload';
		if (!is_dir($path)) {
			@mkdir($path);
		}////guardamos en la carpeta con el id del estudiante sus archivos
		$ruta = '../upload/'.$Id_Usuario.'/';
		$archivo = $ruta.$_FILES["file"]["name"];
		if(!file_exists($ruta)){
			mkdir($ruta);
		}
		if($result->num_rows > 0){
		////actualizarr
		$resulta=@move_uploaded_file($_FILES["file"]["tmp_name"], $archivo);
		if($resulta){
			$sql1 = "UPDATE solicitudes SET url='$archivo' WHERE solicitante='$Id_Usuario'";
			$resultado=$mysqli->query($sql1);
			if($resultado){
				$mensaje="Se modificó exitosamente";
				header("location:../estudiante/indexsol.php?id=$Id_Usuario&mensaje=upload");
			}else{
			    $error="Error al guardar archivo BD...";
			}
	    }else{
		    $error="Error al guardar archivo...";
		}}
		else {
			# code...No hay proyecto registrado
			////actualizarr
		$resulta=@move_uploaded_file($_FILES["file"]["tmp_name"], $archivo);
		if($resulta){
			$sql1 = "INSERT INTO solicitudes (url,solicitante) VALUES ('$archivo','$Id_Usuario')";
			$resultado=$mysqli->query($sql1);
			if($resultado){
				$mensaje="Se registró exitosamente";
				header("location:../estudiante/indexsol.php?id=$Id_Usuario&mensaje=upload");
			}else{
			    $error="Error al guardar archivo BD";
			}
	    }else{
		    $error="Error al guardar archivo";
		}
		}  
		echo 'err'.$error;
		echo 'msg'.$mensaje;

	}
}

?>
	<html>

	<head>
		<title>Proyectos</title>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
		<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
	</head>
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>

	<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>

	<style>
	</style>

	<body>
		<?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {

      ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Documento eliminado!</strong> Se eliminó el documento.
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
		<div class="row-fluid">
			<div class="span12">
				<div class="container card">
					<br />
					<br />
					<br />
					<form enctype="multipart/form-data" action="" name="form" method="post">
						<input class="btn btn-primary" type="file" name="file" id="file" /></td>
						<input class="btn btn-primary" type="submit" name="submit" id="submit" value="Subir" />
					</form>
					<br />
					<br />
					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered"
						id="example">
						<thead>
							<tr>
								<th width="20%" align="center">Nombre</th>
								<th width="20%" align="center">Asunto</th>
								<th width="20%" align="center">Solicitud</th>
								<th width="20%" align="center">Visualizar</th>
								<th align="center">Opcion</th>
							</tr>
						</thead>
						<?php
			$query=$conn->query("select * from solicitudes where solicitante=$Id_Usuario");
			while($row=$query->fetch()){
				$nombredoc=$row['nombredoc'];
				$asunto=$row['asunto'];
				$solicitud=$row['solicitud'];
				$url=$row['url'];
			?>
						<tr>
							<td>
								<?php echo $nombredoc ;?>
							</td>
							<td>
								<?php echo $asunto ;?>
							</td>
							<td>
								<?php echo $solicitud ;?>
							</td>
							<td><a href="<?php echo $url ;?>" target="_blank" rel="noopener noreferrer">Visualizar</a>

							</td>
							<td>
								<button class="alert-danger"><a onclick="return confirm('¿Estas Seguro de eliminar tu proyecto?\n Porque deberás a volver enviar una solicitud de asignacion de jurado')" 
										href="eliminarProyecto.php?id=<?php echo $Id_Usuario; ?>">Eliminar</a></button>
							</td>
						</tr>
						<?php }?>
					</table>
				</div>
			</div>
			<br>
		</div>
	</body>

	</html>