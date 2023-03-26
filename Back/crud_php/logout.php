<?php
    header('Content-Type: application/json');
    session_start();
    if(isset($_GET['session'])){
        $result["success"] = true;
        $result["message"] = "Sesion cerrada";
        session_destroy();
    }else{
        $result["success"] = false;
        $result["message"] = "Inicie sesion para poder salir";
    }
    echo json_encode($result);

?>