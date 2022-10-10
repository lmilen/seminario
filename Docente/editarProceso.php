<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
      header('Location: ../Docente/index.php?mensaje=error');
      exit();
    }

    include '../model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $facultad = $_POST["txtFacultad"];
    $documento = $_POST["txtDocumento"];
    $correo = $_POST["txtCorreo"];
    $password = $_POST["txtPass"];  
    $sentencia = $bd ->prepare("UPDATE profesores SET nombre = ?, apellido = ?, facultad = ?, documento = ?, correo = ?, contra = ? where codigo = ?;");
    $resultado = $sentencia->execute([$nombre,$apellido,$facultad,$documento,$correo,$password,$codigo]);


    if ($resultado === TRUE) {
      header('Location: ../Docente/homesdocente.php?mensaje=editado');
    } else {
      header('Location: ../Docente/homesdocente.php?mensaje=error');
      exit();
    }
    
?>
