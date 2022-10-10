<?php
    if(!isset($_GET['codigo'])){
      header('Location: ../administrativos/index.php?mensaje=error');
      exit();
    }

    include '../model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("DELETE FROM administrativos where codigo =?;");
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado === TRUE) {
      header('Location: ../administrativos/homeadmin.php?mensaje=eliminado');
    } else {
      header('Location: ../administrativos/homeadmin.php?mensaje=error');
      exit();
    }
    
?>