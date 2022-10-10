<?php

include('../model/conexiondoc.php');

$metodoAction  = (int) filter_var($_REQUEST['metodo'], FILTER_SANITIZE_NUMBER_INT);

if($metodoAction == 1){
  $comentario = $_POST['txtcomentario'];
  $solicitud = $_POST['txtidsol'];
  $jurado = $_POST['txtiduser'];
  
    $SqlInsertEstudidante = ("INSERT INTO comentarios(
          idautor,
          idproyecto,
          comentario
        )
        VALUES(
          '" . $jurado . "',
          '" . $solicitud . "',
          '" . $comentario . "'
          
        )");
    $resultInsert = mysqli_query($con, $SqlInsertEstudidante);
    header('Location: homestudent.php?mensaje=exito');
}else {
    header('Location: homestudent.php?mensaje=error');
}
if($metodoAction == 2){
  $comentario = $_POST['txtcomentario'];
  $solicitud = $_POST['txtidsol'];
  $jurado = $_POST['txtiduser'];
  
    $SqlInsertEstudidante = ("INSERT INTO comentarios(
          idautor,
          idproyecto,
          comentario
        )
        VALUES(
          '" . $jurado . "',
          '" . $solicitud . "',
          '" . $comentario . "'


        )");
    $resultInsert = mysqli_query($con, $SqlInsertEstudidante);
    header('Location: homestudent.php?mensaje=exito');
}else {
  header('Location: homestudent.php?mensaje=error');
}
