<?php
    print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtDocum"])
    || empty($_POST["txtNota"])){
    echo "faltan datos";
    }

    include_once '../model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $documento = $_POST["txtDocum"];
    $nota = $_POST["txtNota"];
    $sentencia = $bd ->prepare("INSERT INTO calificacion(nombre,docum,nota,rol) VALUES(?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$docum,$nota,$rol,"calificacion"]);

    if ($resultado === TRUE) {
      header('Location: ../Docente/homesdocente.php?mensaje=registrado');
    } else {
      echo "error";
    }
    
?>