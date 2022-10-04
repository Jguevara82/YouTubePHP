<?php

    include ("db.php");
    session_start();
    if(isset($_SESSION['mail'])){
        $query = "DELETE FROM canal WHERE correo = '".$_SESSION['mail']."';";
        $result = mysqli_query($connection, $query);
        if(!$result) {
            die("Failed to DELETE");
        }else{
            echo "Se ha eliminado el canal";
            session_destroy();
        }
    }else{
        echo "Inicie sesión para darse de baja";
    }

?>