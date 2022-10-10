<?php
    if(!isset($_GET['identificacion'])){
      header('Location: ../administrativos/index.php?mensaje=error');
      exit();
    }

    include '../model/conexion.php';
    $identificacion = $_GET['identificacion'];

    $sentencia = $bd->prepare("DELETE FROM asesoresest where identificacion =?;");
    $resultado = $sentencia->execute([$identificacion]);

    if ($resultado === TRUE) {
      header('Location: ../administrativos/asignacionpro.php?mensaje=eliminado');
    } else {
      header('Location: ../administrativos/asignacionpro.php?mensaje=error');
      exit();
    }
    
?>