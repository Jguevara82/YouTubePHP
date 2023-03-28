<?php
    header('Content-Type: application/json');
    include ("db.php");
    $_DELETE = json_decode(file_get_contents("php://input"),true);
    if(isset($_DELETE['id'])){
        $query = "DELETE FROM comentario WHERE id = '".$_DELETE['id']."';";
        $result["success"] = mysqli_query($connection, $query);
        if(!$result["success"]) {
            $result["message"] = "NO se borro";
        }else{
            $result["message"] = "Comentario eliminado satisfactoriamente";
        }
    }
    echo json_encode($result);

?>