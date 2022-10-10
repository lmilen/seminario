<?php
    include_once '../model/conexion.php';
    include_once '../model/conect.php';

    print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtAutor"])
    || empty($_POST["txtNota"]) || empty($_POST["txtComentario"])){
    echo "faltan datos";
    }

    $idproyecto = $_POST["txtNombre"];
    $idautor = $_POST["txtAutor"];
    $nota = $_POST["txtNota"];
    $comentarios = $_POST["txtComentario"];


  $sentencia2 = $bd ->prepare("UPDATE solicitudes SET calificacion = ?, comentarios = ? where idDocente = ?;");
  $resultado = $sentencia2->execute([$nota,$comentarios,$idautor]);



    
    if ($resultado === TRUE) {
      header('Location: ../Docente/homesdocente.php?mensaje=registrado');
    } else {
      echo "error";
    }
    
?>