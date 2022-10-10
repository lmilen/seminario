<?php
    print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtApellido"])
   || empty($_POST["txtCargo"])  || empty($_POST["txtDocumento"]) 
    || empty($_POST["txtCorreo"]) || empty($_POST["txtPass"])){
    echo "faltan datos";
    }

    include_once '../model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $cargo = $_POST["txtCargo"];
    $documento = $_POST["txtDocumento"];
    $correo = $_POST["txtCorreo"];
    $password = $_POST["txtPass"];
    $sentencia = $bd ->prepare("INSERT INTO administrativos(nombre,apellido,
    cargo,documento,correo,contra,rol) VALUES(?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$apellido,$cargo,$documento,$correo,$password,"administrativos"]);

    if ($resultado === TRUE) {
      header('Location: ../administrativos/index.php?mensaje=registrado');
    } else {
      echo "error";
    }
    
?>