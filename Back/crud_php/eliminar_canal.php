<?php
    header('Content-Type: application/json');
    include ("db.php");
    session_start();
    $_DELETE = json_decode(file_get_contents("php://input"),true);
    if(isset($_DELETE['session'])){
        $query = "DELETE FROM canal WHERE correo = '".$_DELETE['session']."';";
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