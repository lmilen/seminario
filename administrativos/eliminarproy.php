<?php
   ////eliminar una carpeta
   function eliminarDir($carpeta){
    foreach(glob($carpeta . "/*") as $archivo_carpeta){
        if(is_dir($archivo_carpeta)){
            eliminarDir($archivo_carpeta);
        }else{
            unlink($archivo_carpeta);
        }
    }
    rmdir($carpeta);
  }
    if(!isset($_GET['idsolicitud'])){
      header('Location: ../administrativos/index.php?mensaje=error');
      exit();
    }

    include '../model/conexion.php';
    include '../model/conect.php';
    $idDoc=0;
    $idsolicitud = $_GET['idsolicitud'];
    $sql = "SELECT * FROM solicitudes WHERE idsolicitud = '$idsolicitud'";
    $result = $mysqli->query($sql);
    while ($row=$result->fetch_assoc() ) {
      $idEst=$row['solicitante'];    
      $idDoc=$row['idDocente'];    
    }

    $sentencia = $bd->prepare("DELETE FROM solicitudes where idsolicitud =?;");
    $resultado = $sentencia->execute([$idsolicitud]);

    if ($resultado === TRUE) {
      ///desasignar el proyecto a l docente si habia
      if($idDoc>0){
        $sentencia2 = $bd ->prepare("UPDATE profesores SET idProyecto = ? where codigo = ?;");
        $resultado = $sentencia2->execute([0,$idDoc]);
      }
      $ruta = '../upload/'.$idEst.'/';
      if(file_exists($ruta)){
          eliminarDir('../upload/'.$idEst);
      }
      header('Location: ../administrativos//homesolicitud.php?mensaje=eliminado');
    } else {
      header('Location: ../administrativos//homesolicitud.php?mensaje=error');
      exit();
    }
    
?>
