<?php
    include ("db.php");

    $email = $_GET['email'];
    $password = $_GET['password'];
    //$query = "SELECT * FROM canal;";
    $query = "SELECT * FROM canal WHERE correo='$email'";
    $result = mysqli_query($connection, $query);
    if(!($dato1 = mysqli_fetch_array($result))){
        echo "No hay canal asociado a ese correo";
    }else{
        if($dato1['contra']== $password){
            session_start();
            $_SESSION['mail'] = $dato1['correo'];
            $_SESSION['username'] = $dato1['usuario'];
            //header("Location: index.php");
        }else{
            echo "Contraseña incorrecta";
        }
    }
?>