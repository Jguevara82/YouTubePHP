<?php
    header('Content-Type: application/json');
    include ("db.php");
    
    $correo = $_POST['correo'];
    $video = $_POST['video'];
    $comentario = $_POST['texto'];
    $query = "INSERT INTO comentario(correo_inicio, id_video, texto) VALUES ('$correo', '$video', '$comentario');";
    $result["success"] = mysqli_query($connection, $query);
    if(!$result["success"]){
        $result["message"] = "Comentario NO agregado";
    }else{
        $result["message"] = "Comentario agregado satisfactoriamente";
    }
    echo json_encode($result);
?>