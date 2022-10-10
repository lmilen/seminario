<?php
    $servidor = "localhost";
    $user = "root";
    $password = "";
    $db = "dbsem2";

    $conexion = mysqli_connect($servidor,$user,$password,$db);

    if ($conexion) {
        header('Location: index.php?mensaje=conectsuccess');
        # code...
    } else {
        header('Location: index.php?mensaje=errorconect');
        exit();
    }
    

?>