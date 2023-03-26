<?php
    header('Content-Type: application/json');
    include ("db.php");
    
    $sub = $_POST['sub'];
    $target = $_POST['target'];
    $query = "INSERT INTO suscripcion(correo_inicio, correo_fin	) VALUES ('$sub', '$target');";
    $result["success"] = mysqli_query($connection, $query);
    if(!$result["success"]){
        $result["message"] = "Suscripción NO registrada";
    }else{
        $result["message"] = "Te has suscrito satisfactoriamente";
    }
    echo json_encode($result);
?>