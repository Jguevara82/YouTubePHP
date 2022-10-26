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
                include("drive_con.php");
                try{
                    $file = new Google_Service_Drive_DriveFile();
                    $file->setName("$id" . ".$extension");
                    $file->setParents(array("1d8Fsc_7fMMUmvCIHTSncfLrfVNksnC6j"));
                    $file->setDescription("Subido por: ". $_SESSION['mail']);
                    $file->setMimeType("video/$extension");
                
                    $resultado = $service->files->create(
                        $file,
                        array(
                            'data' => file_get_contents($tmp),
                            'mimeType' => "video/$extension",
                            'uploadType' => 'media'
                        )
                    );
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
                }catch(Google_Service_Exception $gs){
                    $message = json_decode($gs->getMessage());
                    $result["message"] = $message->error->message();
                    $result["success"] = false;
                }catch(Exception $e){
                    $result["message"] = $e->getMessage();
                    $result["success"] = false;
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