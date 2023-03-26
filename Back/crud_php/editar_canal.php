<?php
    header('Content-Type: application/json');
    include ("db.php");
    session_start();
    $_PUT = json_decode(file_get_contents("php://input"),true);
    if(isset($_PUT['session'])){
        $max=count($_PUT)-1;
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
        $query = "UPDATE canal SET $cambios WHERE correo = '". $_PUT['session'] ."'";
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