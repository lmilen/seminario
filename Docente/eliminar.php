<?php
    if(!isset($_GET['codigo'])){
      header('Location: ../Docente/index.php?mensaje=error');
      exit();
    }

    include '../model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("DELETE FROM profesores where codigo =?;");
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado === TRUE) {
      header('Location: ../Docente/index.php?mensaje=eliminado');
    } else {
      header('Location: ../Docente/index.php?mensaje=error');
      exit();
    }
    
?>