<?php
    header('Content-Type: application/json');
    include ("../crud_php/db.php");
    $_DELETE = json_decode(file_get_contents("php://input"),true);
    if(isset($_DELETE['mail'])){
        $query = "SELECT * FROM video WHERE id = '".$_DELETE['id']."';";
        $data = mysqli_query($connection, $query);  
        if(!($dato = mysqli_fetch_assoc($data))){
            $result["success"] = false;
            $result["message"] = "Video no encontrado";
        }else{
            include("drive_con.php");
            $video = $service->files->listFiles([
                'q' => "name='". $dato["archivo"] ."'",
                //'fields' => 'files(id)'
            ]);
            $service->files->delete([$video[0]['id']]);
            $query = "DELETE FROM video WHERE id = '".$_DELETE['id']."';";
            if(!mysqli_query($connection, $query)) {
                $result["success"] = false;
                $result["message"] = "NO se borro";
            }else{
                $result["success"] = true;
                $result["message"] = "Se ha eliminado el video";
            }
        }
    }else{
        $result["success"] = false;
        $result["message"] = "Inicie sesion antes de eliminar algún video, por favor";
    }
    echo json_encode($result);
?>