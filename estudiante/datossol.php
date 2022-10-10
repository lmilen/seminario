<?php
//$document = $_SESSION['usuario'];
    print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtIdsolicitud"]) || empty($_POST["txtNombredoc"]) 
    || empty($_POST["txtAsunto"]) || empty($_POST["txtSolicitud"])){
    echo "faltan datos";
    }

    include_once '../model/conexion.php';
    include_once "../model/conect.php";

    $documento = $_POST["txtIdsolicitud"];
    $nombredoc = $_POST["txtNombredoc"];
    $asunto = $_POST["txtAsunto"];
    $solicitud = $_POST["txtSolicitud"];

    $sql = "SELECT * FROM solicitudes WHERE solicitante = '$documento'";
    $result = $mysqli->query($sql);
    if($result->num_rows > 0){
      ///ya tiene registrado un proyecto
      $sentencia = $bd ->prepare("UPDATE solicitudes SET nombredoc=?, asunto=?, solicitud=? WHERE solicitante=?;");
      $resultado = $sentencia->execute([$nombredoc,$asunto,$solicitud,$documento]);
    }
    else{
      $sentencia = $bd ->prepare("INSERT INTO solicitudes(nombredoc,asunto,solicitud,solicitante) 
      VALUES(?,?,?,?);");
      $resultado = $sentencia->execute([$nombredoc,$asunto,$solicitud,$documento]);
  
    }
    
    if ($resultado === TRUE) {
      header('Location: ../estudiante/homestudent.php?mensaje=registrado');
    } else {
      echo "error";
    }
    
?>
