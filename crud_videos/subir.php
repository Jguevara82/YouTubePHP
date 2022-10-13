<?php
    include ("../crud_php/db.php");
    session_start();
    if(isset($_SESSION['mail'])){
        $archivo = $_FILES['file'];
        $nombre = $archivo['name'];
        $tmp = $archivo['tmp_name'];
        $error = $archivo['error'];
        $extension = explode(".", $nombre);
        $extension = strtolower(end($extension));
        $description = "Sin descripción";
        if(isset($_POST['description'])&&!empty($_POST['description'])){
            $description = $_POST['description'];
        }
        if($extension=='mp4'){
            if($error==0){
                $categoria = 'Gente y blogs';
                $canal = $_SESSION['mail'];
                $titulo = time();
                $id = uniqid("", true);
                $nombre =  $id . '.' . $extension;
                if(move_uploaded_file($tmp, "C:/Users/Public/Documents/Videos/" . $nombre)){
                    //echo "Uploaded in C:/Users/Public/Documents/Videos/" . $nombre;
                    if(isset($_POST['titulo'])){
                        $titulo = $_POST['titulo'];
                    }
                    if(isset($_POST['categoria'])){
                        $categoria = $_POST['categoria'];
                    }
                    $query = "INSERT INTO video (id, canal, archivo, titulo, descripcion, visitas, fecha_subido, categoria) VALUES ('$id', '$canal', '$nombre', '$titulo', '$description', '0', current_timestamp(), '$categoria')";
                    $result["success"] = mysqli_query($connection, $query);
                    if(!$result["success"]){
                        $result["message"] = "Video NO subido";
                    }else{
                        $result["message"] = "Video subido satisfactoriamente";
                    }
                }else{
                    echo "No se subió el archivo";
                }
            }else{
                echo "ERROR";
            }
        }else{
            echo "El archivo no es del tipo adecuado";
        }
    }else{
        $result["success"] = false;
        $result["message"] = "Inicie sesion para subir videos";
    }
    echo json_encode($result);
?>