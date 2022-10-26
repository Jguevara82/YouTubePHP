<?php
    include ("db.php");
    session_start();
    if(isset($_SESSION['mail'])){
        $_PUT = json_decode(file_get_contents("php://input"),true);
        //echo "Sesión activa: ".$_SESSION['mail'];
        $max=count($_PUT);
        $aux=0;
        $cambios="";
        if(isset($_PUT['username'])){
            $cambios.= "usuario = '".$_PUT['username']. "' ";
            if($aux<$max-1){
                $cambios.= ", ";
                $aux++;
            }
        }
        if(isset($_PUT['password'])){
            $cambios.= "contra = '".$_PUT['password'] . "' ";
            if($aux<$max-1){
                $cambios.= ", ";
                $aux++;
            }
        }
        if(isset($_PUT['description'])){
            $cambios.= "descripcion = '".$_PUT['description']. "' ";
            if($aux<$max-1){
                $cambios.= ", ";
                $aux++;
            }
        }
        $query = "UPDATE canal SET $cambios WHERE correo = '".$_SESSION['mail'] ."'";
        //echo $query;
        $result["success"] = mysqli_query($connection, $query);
        //echo "\n$result";
        if(!$result["success"]){
            $result["message"] = "Failed to UPDATE";
        }else{
            $result["message"] = "Se ha editado el canal";
        }
    }else{
        $result["success"] = false;
        $result["message"] = "Inicie sesion antes de editar, por favor";
    }
    echo json_encode($result);
?>