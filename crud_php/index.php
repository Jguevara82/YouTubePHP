<?php
    //include ("db.php");
    session_start();
    
    if(isset($_SESSION['mail'])){
        echo "<h1>Bienvenido a YouTube 2, ".$_SESSION['username']."</h1>";
        if(isset($_GET['salir'])){
            session_destroy();
            header("Location: index.php");
        }
    }else{
        echo "<h1>Bienvenido a YouTube 2</h1>";
    }

?>