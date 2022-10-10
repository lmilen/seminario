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

    if(!isset($_GET['id'])){
      header('Location: index.php?mensaje=error');
      exit();
    }

    include '../model/conexion.php';
    include '../model/conect.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM solicitudes WHERE idsolicitud = '$id'";
    $result = $mysqli->query($sql);
    while ($row=$result->fetch_assoc() ) {
      $idEst=$row['solicitante'];    
      $idDoc=$row['idDocente'];    
    }
    $sentencia = $bd->prepare("DELETE FROM solicitudes where solicitante =?;");
    $resultado = $sentencia->execute([$id]);

    if ($resultado === TRUE) {
      ///desasignar el proyecto a l docente si habia
      if($idDoc>0){
        $sentencia2 = $bd ->prepare("UPDATE profesores SET idProyecto = ? where codigo = ?;");
        $resultado = $sentencia2->execute([0,$idDoc]);
      }
      $ruta = '../upload/'.$id.'/';
      if(file_exists($ruta)){
          eliminarDir('../upload/'.$id);
      }
      header('Location: descargar.php?id='.$id.'&mensaje=eliminado');
    } else {
      header('Location: descargar.php?id='.$id.'&mensaje=error');
      exit();
    }
    
?>