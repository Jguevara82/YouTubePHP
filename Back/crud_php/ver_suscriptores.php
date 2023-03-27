<?php
    header('Content-Type: application/json');
    include ("db.php");
    if(isset($_GET['mail'])){
        $result["success"] = true;
        $query = "SELECT correo_inicio, fecha FROM suscripcion WHERE correo_fin='" . $_GET['mail'] . "';";
        $canal = mysqli_query($connection, $query);
        $result["data"] = array();
        while ($dato = mysqli_fetch_assoc($canal)){
            $result["data"][] = $dato;
        }
                
    }else{
        $result["success"] = false;
        $result["message"] = "Ingrese un correo válido";
    }
    echo json_encode($result);

?>