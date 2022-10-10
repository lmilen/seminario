<?php
  session_start();
  include("../model/conexion2.php");
  
  $usuario = $_POST['user'];
  $password = $_POST['pass'];

  $sql = "SELECT * FROM administrativos WHERE documento = '$usuario'";

  $resultado = mysqli_query($conexion,$sql);

  while ($row = mysqli_fetch_array($resultado)) {
    $usuario_db = $row['documento'];
    $password_db = $row['contra'];
    $nombre_bd = $row['nombre'];
    $codigo_db=$row['codigo'];
  }

  if ($usuario == $usuario_db && $password == $password_db) {
    $_SESSION['usuario']=$usuario;
    $_SESSION['nombre']=$nombre_bd;
    header('Location: home.php?mensaje=loginsuccess');
    exit();
  } else {
    header('Location: ../administrativos/loginadm.php?mensaje=errorlogin');
    exit();
  }
  
?>