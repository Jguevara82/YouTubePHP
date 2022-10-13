<?php
    include ("../crud_php/db.php");
    session_start();
    if(isset($_SESSION['mail'])){
        $_PUT = json_decode(file_get_contents("php://input"),true);
        //echo "Sesión activa: ".$_SESSION['mail'];
        $max=count($_PUT);
        $aux=0;
        $cambios="";
        if(isset($_PUT['titulo'])){
            $cambios.= "titulo = '".$_PUT['titulo']. "' ";
            if($aux<$max-1){
                $cambios.= ", ";
                $aux++;
            }
        }
        if(isset($_PUT['description'])){
            $cambios.= "descripcion = '".$_PUT['description'] . "' ";
            if($aux<$max-1){
                $cambios.= ", ";
                $aux++;
            }
        }
        if(isset($_PUT['categoria'])){
            $cambios.= "categoria = '".$_PUT['categoria']. "' ";
            if($aux<$max-1){
                $cambios.= ", ";
                $aux++;
            }
        }
        $query = "UPDATE video SET $cambios WHERE id = '".$_GET['id'] ."'";
        //echo $query;
        $result["success"] = mysqli_query($connection, $query);
        //echo "\n$result";
        if(!$result["success"]){
            $result["message"] = "Failed to UPDATE";
        }else{
            $result["message"] = "Se ha editado el video";
        }
    }else{
        $result["success"] = false;
        $result["message"] = "Inicie sesion antes de editar, por favor";
    }
    echo json_encode($result);
?>