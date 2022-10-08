<?php

    include ("db.php");
    session_start();
    if(isset($_SESSION['mail'])){
        $query = "DELETE FROM canal WHERE correo = '".$_SESSION['mail']."';";
        $result["success"] = mysqli_query($connection, $query);
        if(!$result["success"]) {
            $result["message"] = "NO se borro";
        }else{
            $result["message"] = "Se ha eliminado el canal";
            session_destroy();
        }
    }else{
        $result["success"] = false;
        $result["message"] = "Inicie sesion para darse de baja";
    }
    echo json_encode($result);

?>