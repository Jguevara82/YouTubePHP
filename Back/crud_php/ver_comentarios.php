<?php
    header('Content-Type: application/json');
    include ("db.php");
    if(isset($_GET['video'])){
        $result["success"] = true;
        $query = "SELECT id, correo_inicio, texto, fecha FROM comentario WHERE id_video='" . $_GET['video'] . "';";
        $canal = mysqli_query($connection, $query);
        $result["data"] = array();
        while ($dato = mysqli_fetch_assoc($canal)){
            $result["data"][] = $dato;
        }
                
    }else{
        $result["success"] = false;
        $result["message"] = "Ingrese un video válido";
    }
    echo json_encode($result);

?>