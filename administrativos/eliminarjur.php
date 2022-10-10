<?php
    if(!isset($_GET['codigo'])){
      header('Location: ../administrativos/index.php?mensaje=error');
      exit();
    }

    include '../model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("DELETE FROM solicitestud where codigo =?;");
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado === TRUE) {
      header('Location: ../administrativos/asesorestadm.php?mensaje=eliminado');
    } else {
      header('Location: ../administrativos/asesorestadm.php?mensaje=error');
      exit();
    }
    
?>