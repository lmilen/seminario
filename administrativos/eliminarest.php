<?php
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
    if(!isset($_GET['codigo'])){
      header('Location: ../administrativos/index.php?mensaje=error');
      exit();
    }

    include '../model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("DELETE FROM estudiante where codigo =?;");
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado === TRUE) {
      $ruta = '../upload/'.$codigo.'/';
      if(file_exists($ruta)){
          eliminarDir('../upload/'.$codigo);
      }
      header('Location: ../administrativos/homestudent.php?mensaje=eliminado');
    } else {
      header('Location: ../administrativos/homestudent.php?mensaje=error');
      exit();
    }
    
?>