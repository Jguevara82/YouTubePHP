<?php
// Establecer encabezados HTTP para permitir solicitudes desde cualquier origen
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include ("db.php");

// Verificar que se recibió una solicitud GET
if ($_SERVER["REQUEST_METHOD"] === "GET") {

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

}elseif ($_SERVER["REQUEST_METHOD"] === "POST") {

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

}elseif ($_SERVER["REQUEST_METHOD"] === "PUT") {

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

}elseif ($_SERVER["REQUEST_METHOD"] === "DELETE") {
    
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
}

echo json_encode($result);

?>