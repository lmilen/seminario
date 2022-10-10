<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
      header('Location: index.php?mensaje=error');
      exit();
    }

    include '../model/conexion.php';
    $codigo = $_POST['codigo'];
    $identificacion = $_POST["txtIdentificacion"];
    $programa = $_POST["txtPrograma"];
    $facultad = $_POST["txtFacultad"];
    $documento = $_POST["txtDocumento"];
    $correo = $_POST["txtCorreo"];
    $password = $_POST["txtPass"];  
    $opinion = $_POST["txtOpinion"];
    $sentencia = $bd ->prepare("UPDATE solicitestud SET identificacion = ?, programa = ?, facultad = ?, documento = ?, correo = ?, contra = ?, opinion = ? where codigo = ?;");
    $resultado = $sentencia->execute([$identificacion,$programa,$facultad,$documento,$correo,$password,$opinion,$codigo]);

    if ($resultado === TRUE) {
      header('Location: homestudent.php?mensaje=editado');
    } else {
      header('Location: homestudent.php?mensaje=error');
      exit();
    }
    
?>