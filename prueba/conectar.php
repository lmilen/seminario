<?php    
    define("HOST", "localhost");
    define("USUARIO", "root");
    define("CLAVE", "");
    define("BD", "dbsem2");    
    /* Entrega un objeto con la conexión MySQL */
    function conectObj(){
        $my = new mysqli(HOST, USUARIO, CLAVE, BD);
        if($my->connect_errno){
            echo "<p>No se ha logrado la conexión</p>";
            exit(0);
        }else return $my;
    }
?>