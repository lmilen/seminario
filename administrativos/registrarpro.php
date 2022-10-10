<?php
    print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtIdentificacion"]) || empty($_POST["txtTipo"]) 
    || empty($_POST["txtAse"]) || empty($_POST["txtNomp"]) || empty($_POST["txtIdentest"])){
    echo "faltan datos";
    }

    include_once '../model/conexion.php';
    $identificacion = $_POST["txtIdentificacion"];
    $tipo = $_POST["txtTipo"];
    $ase = $_POST["txtAse"];
    $nomp = $_POST["txtNomp"];
    $identest = $_POST["txtIdentest"];
    $sentencia = $bd ->prepare("INSERT INTO asesoresest(identificacion,tipo,ase,nomp,identest,rol) 
    VALUES(?,?,?,?,?,?);");
    $resultado = $sentencia->execute([ $identificacion,$tipo,$ase,$nomp,$identest,"asesoresest"]);

    if ($resultado === TRUE) {
      header('Location: ../administrativos/homesdocente.php?mensaje=registrado');
    } else {
      echo "error";
    }
    
?>