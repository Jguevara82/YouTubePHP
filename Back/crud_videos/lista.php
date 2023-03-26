<?php
    header('Content-Type: application/json');
    include ("../crud_php/db.php");
    session_start();
    if(isset($_SESSION['mail'])){
        //echo count($_DELETE);
        $query = "SELECT titulo FROM video WHERE canal = '".$_SESSION['mail']."';";
        $data = mysqli_query($connection, $query);
        $result['list'] = [];
        while($row = mysqli_fetch_assoc($data)){
            array_push($result['list'],$row['titulo']);
        }
        $result['success'] = true;
        $result["message"] = "Videos obtenidos satisfactoriamente";
    }else{
        $result["success"] = false;
        $result["message"] = "Inicie sesion para ver sus videos, por favor";
    }
    echo json_encode($result);
?>