<?php
    print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtIdentificacion"]) || empty($_POST["txtJurado"]) || empty($_POST["txtAsesor"])
   || empty($_POST["txtAprobado"])){
    echo "faltan datos";
    }

    include_once '../model/conexion.php';
    $identificacion = $_POST["txtIdentificacion"];
    $jurado = $_POST["txtJurado"];
    $asesor = $_POST["txtAsesor"];
    $aprobado = $_POST["txtAprobado"];
    $sentencia = $bd ->prepare("INSERT INTO solicitestud(identificacion,jurado,asesor,
    aprobado,rol) VALUES(?,?,?,?,?);");
    $resultado = $sentencia->execute([ $identificacion,$jurado,$asesor,$aprobado,"solicitestud"]);

    if ($resultado === TRUE) {
      header('Location: ../administrativos/homestudent.php?mensaje=registrado');
    } else {
      echo "error";
    }
    
?>