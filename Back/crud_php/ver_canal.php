<?php
    header('Content-Type: application/json');
    include ("db.php");
    session_start();
    if(isset($_GET['mail'])){
        $result["success"] = true;
        $query = "SELECT * FROM canal WHERE correo='" . $_GET['mail'] . "'";
        $canal = mysqli_query($connection, $query);
        if(!($dato1 = mysqli_fetch_assoc($canal))){
            $result["success"] = false;
            $result["message"] = "No hay canal asociado a ese correo, registrese";
        }else{
            $result["data"] = $dato1;
            unset($result["data"]["correo"]);
            unset($result["data"]["subs"]);
            unset($result["data"]["fecha"]);
        }
                
    }else{
        $result["success"] = false;
        $result["message"] = "Ingrese un correo válido";
    }
    echo json_encode($result);

?>