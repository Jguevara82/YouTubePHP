<?php
    header('Content-Type: application/json');
    include ("../crud_php/db.php");
    session_start();
    if(isset($_SESSION['mail'])){
        //echo count($_DELETE);
        $query = "SELECT * FROM video WHERE id = '".$_GET['id']."';";
        $data = mysqli_query($connection, $query);  
        if(!($dato = mysqli_fetch_assoc($data))){
            $result["success"] = false;
            $result["message"] = "Video no encontrado";
        }else{
            $result['datos'] = $dato;
            $result["success"] = true;
            $result["message"] = "Video encontrado";
        }
    }else{
        $result["success"] = false;
        $result["message"] = "Inicie sesion para ver sus videos, por favor";
    }
    echo json_encode($result);
?>