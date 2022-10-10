<?php

    include_once '../model/conexion.php';
    
    $idpro = $_GET["id"];
    $idsol = $_GET["idsolicitud"];
    
    
    $sentencia = $bd ->prepare("UPDATE solicitudes SET idDocente = ? WHERE idsolicitud=?;");
    $resultado = $sentencia->execute([$idpro,$idsol]);

    $sentencia2 = $bd ->prepare("UPDATE profesores SET idProyecto = ? WHERE codigo=?;");
    $resultado2 = $sentencia2->execute([$idsol,$idpro]);
    if ($resultado === TRUE) {
      header('Location: ../administrativos/homesolicitud.php?mensaje=registrado');
    } else {
      echo "error";
    }
    
?>
