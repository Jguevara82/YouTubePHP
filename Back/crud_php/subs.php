<?php
// Establecer encabezados HTTP para permitir solicitudes desde cualquier origen
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include ("db.php");

// Verificar que se recibió una solicitud GET
if ($_SERVER["REQUEST_METHOD"] === "GET") {

    if(isset($_GET['mail'])){

        if($_GET["suscriptores"] === "true") {
            
            $query = "SELECT correo_inicio, fecha FROM suscripcion WHERE correo_fin='" . $_GET['mail'] . "';";
            
        }else{
            $query = "SELECT correo_fin, fecha FROM suscripcion WHERE correo_inicio='" . $_GET['mail'] . "';";
        }
        $canal = mysqli_query($connection, $query);
        $result["data"] = array();
        while ($dato = mysqli_fetch_assoc($canal)){
            $result["data"][] = $dato;
        }
        $result["success"] = true;

    }else{
        $result["success"] = false;
        $result["message"] = "Ingrese un correo válido";
    }

}elseif ($_SERVER["REQUEST_METHOD"] === "POST") {

    $sub = $_POST['sub'];
    $target = $_POST['target'];
    $query = "INSERT INTO suscripcion(correo_inicio, correo_fin) VALUES ('$sub', '$target');";
    $result["success"] = mysqli_query($connection, $query);
    if(!$result["success"]){
        $result["message"] = "Suscripción NO registrada";
    }else{
        $result["message"] = "Te has suscrito satisfactoriamente";
    }

}elseif ($_SERVER["REQUEST_METHOD"] === "DELETE") {
    
    $_DELETE = json_decode(file_get_contents("php://input"),true);
    if(isset($_DELETE['sender']) && isset($_DELETE['target'])){
        $query = "DELETE FROM suscripcion WHERE correo_inicio = '".$_DELETE['sender']."' AND correo_fin = '".$_DELETE['target']."';";
        $result["success"] = mysqli_query($connection, $query);
        if(!$result["success"]) {
            $result["message"] = "NO se borro";
        }else{
            $result["message"] = "Se ha desuscrito satisfactoriamente";
        }
    }
    
}

echo json_encode($result);

?>