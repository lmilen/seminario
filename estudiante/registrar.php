<?php
    print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["ocultaidsolicitud"]) || empty($_POST["txtNombre"]) || empty($_POST["txtApellido"])
    || empty($_POST["txtPrograma"])|| empty($_POST["txtFacultad"])  || empty($_POST["txtDocumento"]) 
    || empty($_POST["txtCorreo"]) || empty($_POST["txtPass"])){
    echo "faltan datos";
    }

    include_once '../model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $programa = $_POST["txtPrograma"];
    $facultad = $_POST["txtFacultad"];
    $documento = $_POST["txtDocumento"];
    $correo = $_POST["txtCorreo"];
    $password = $_POST["txtPass"];
    $sentencia = $bd ->prepare("INSERT INTO estudiante(nombre,apellido,programa,
    facultad,documento,correo,contra,rol) VALUES(?,?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$apellido,$programa,$facultad,$documento,$correo,$password,"estudiante"]);

    if ($resultado === TRUE) {
      header('Location: ../estudiante/index.php?mensaje=registrado');
    } else {
      echo "error";
    }
    
?>
