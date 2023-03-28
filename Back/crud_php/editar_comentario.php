<?php
    header('Content-Type: application/json');
    include ("db.php");
    $_PUT = json_decode(file_get_contents("php://input"),true);
    if(isset($_PUT['id'])){
        $query = "UPDATE comentario SET texto = '".$_PUT['text']."' WHERE id = ".$_PUT['id'];
        $result["success"] = mysqli_query($connection, $query);
        if(!$result["success"]) {
            $result["message"] = "NO se editó";
        }else{
            $result["message"] = "Comentario editado satisfactoriamente";
        }
    }
    echo json_encode($result);

?>