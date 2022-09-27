<?php
    include ("db.php");
    session_start();
    if(isset($_SESSION['mail'])){
        echo "Sesión activa: ".$_SESSION['mail'];
        $max=count($_GET);
        $aux=0;
        $cambios="";
        if(isset($_GET['username'])){
            $cambios.= "usuario = '".$_GET['username']. "' ";
            if($aux<$max-1){
                $cambios.= ", ";
                $aux++;
            }
        }
        if(isset($_GET['password'])){
            $cambios.= "contra = '".$_GET['password'] . "' ";
            if($aux<$max-1){
                $cambios.= ", ";
                $aux++;
            }
        }
        if(isset($_GET['description'])){
            $cambios.= "descripcion = '".$_GET['description']. "' ";
            if($aux<$max-1){
                $cambios.= ", ";
                $aux++;
            }
        }
        $query = "UPDATE canal SET $cambios WHERE correo = '".$_SESSION['mail'] ."'";
        //echo $query;
        $result = mysqli_query($connection, $query);
        //echo "\n$result";
        if(!$result){
            die("Failed to UPDATE");
        }else{
            echo "Se ha editado el canal";
        }
    }else{
        die("Inicie sesión antes de editar, por favor");
    }

?>