<?php
    header('Content-Type: application/json');
    include ("db.php");
    session_start();
    if(isset($_GET['session'])){
        $result["success"]=false;
        $result["message"] = "Ya hay una sesion abierta";
    }else{
        $email = $_GET['email'];
        $password = $_GET['password'];
        $query = "SELECT * FROM canal WHERE correo='$email'";
        $result["channel"] = mysqli_query($connection, $query);
        if(!($dato1 = mysqli_fetch_assoc($result["channel"]))){
            $result["success"] = false;
            $result["message"] = "No hay canal asociado a ese correo, registrese";
        }else{
            if($dato1['contra']== $password){
                $result["mail"]=$dato1['correo'];
                $result["user"]=$dato1['usuario'];
                $result["success"] = true;
                $_SESSION['mail'] = $dato1['correo'];
                $_SESSION['username'] = $dato1['usuario'];
                $result["message"] = "Bienvenido";
            }else{
                $result["success"] = false;
                $result["message"] = "Contraseña incorrecta";
            }
        }
        unset($result["channel"]);
    }
    echo json_encode($result);
?>