<?php
  session_start();
  include("../model/conexion2.php");
  
  $usuario = $_POST['user'];
  $password = $_POST['pass'];

  $sql = "SELECT * FROM estudiante WHERE documento = '$usuario'";

  $resultado = mysqli_query($conexion,$sql);

  while ($row = mysqli_fetch_array($resultado)) {
    $usuario_db = $row['documento'];
    $password_db = $row['contra'];
    $nombre_bd = $row['nombre'];
    $codigo_db=$row['codigo'];
  }

  if ($usuario == $usuario_db && $password_db == $password) {
    $_SESSION['usuario']=$usuario;
    $_SESSION['nombre']=$nombre_bd;
    header('Location: homestudent.php?mensaje=loginsuccess');
    exit();
  } else {
    echo($password);
    header('Location: ../estudiante/logi.php?mensaje=errorlogin');
    exit();
  }

?>
