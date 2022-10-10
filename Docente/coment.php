<?php
  session_start();
  include("../model/conect.php");

    print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtComentario"])){
    echo "faltan datos";
    }

    include_once '../model/conexion.php';
    $identificacion = $_POST["txtIdentificacion"];
    $proyecto = $_POST["txtProyecto"];
    $comentario = $_POST["txtComentario"];
    /////////////verificar si hay comentarios
    $idcoment=0;
    $sql = "SELECT * FROM comentarios WHERE idautor = '$identificacion'";
    $result = $mysqli->query($sql);
    print_r($result);
    
    
    if($result->num_rows == 0){
    $sentencia2 = $bd ->prepare("INSERT INTO comentarios(idautor,idproyecto,comentario) 
    VALUES(?,?,?);");
    $resultado = $sentencia2->execute([$identificacion,$proyecto,$comentario]);
// echo 'inser';
    }
    else {
      $sentencia2 = $bd ->prepare("UPDATE comentarios SET comentario = ? where idautor = ?;");
    $resultado = $sentencia2->execute([$comentario,$identificacion]);
    echo 'update';

    }
    if ($resultado === TRUE) {
      header('Location: ../Docente/homesdocente.php?mensaje=registrado');
    } else {
      // echo "error";
    }
    
?>