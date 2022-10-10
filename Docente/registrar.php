<?php
    print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtApellido"])
    || empty($_POST["txtFacultad"])  || empty($_POST["txtDocumento"]) 
    || empty($_POST["txtCorreo"]) || empty($_POST["txtPass"])){
    echo "faltan datos";
    }

    include_once '../model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $facultad = $_POST["txtFacultad"];
    $documento = $_POST["txtDocumento"];
    $correo = $_POST["txtCorreo"];
    $password = $_POST["txtPass"];
    $sentencia = $bd ->prepare("INSERT INTO profesores(nombre,apellido,
    facultad,documento,correo,contra,rol) VALUES(?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$apellido,$facultad,$documento,$correo,$password,"docente"]);

    if ($resultado === TRUE) {
      header('Location: ../Docente/index.php?mensaje=registrado');
    } else {
      echo "error";
    }
    
?>