<?php
    header('Content-Type: application/json');
    include ("db.php");
    session_start();
    $_DELETE = json_decode(file_get_contents("php://input"),true);
    if(isset($_DELETE['sender']) && isset($_DELETE['target'])){
        $query = "DELETE FROM suscripcion WHERE correo_inicio = '".$_DELETE['sender']."' AND correo_fin = '".$_DELETE['target']."';";
        $result["success"] = mysqli_query($connection, $query);
        if(!$result["success"]) {
            $result["message"] = "NO se borro";
        }else{
            $result["message"] = "Se ha desuscrito satisfactoriamente";
            session_destroy();
        }
    }
    echo json_encode($result);

?>