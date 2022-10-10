<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
      header('Location: ../administrativos/index.php?mensaje=error');
      exit();
    }

    include '../model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $cargo = $_POST["txtCargo"];
    $documento = $_POST["txtDocumento"];
    $correo = $_POST["txtCorreo"];
    $password = $_POST["txtPass"];  
    $sentencia = $bd ->prepare("UPDATE administrativos SET nombre = ?, apellido = ?, cargo = ?, documento = ?, correo = ?, contra = ? where codigo = ?;");
    $resultado = $sentencia->execute([$nombre,$apellido,$cargo,$documento,$correo,$password,$codigo]);

    if ($resultado === TRUE) {
      header('Location: ../administrativos/homeadmin.php?mensaje=editado');
    } else {
      header('Location: ../administrativos/homeadmin.php?mensaje=error');
      exit();
    }
    
?>
