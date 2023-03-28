<?php
// Establecer encabezados HTTP para permitir solicitudes desde cualquier origen
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include ("db.php");

// Verificar que se recibió una solicitud GET
if ($_SERVER["REQUEST_METHOD"] === "GET") {

    if(isset($_GET["login"])){

        if($_GET["login"] === "true"){

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
                    $result["message"] = "Bienvenido";
                }else{
                    $result["success"] = false;
                    $result["message"] = "Contraseña incorrecta";
                    unset($result["channel"]);
                }
            }

        }else{

            $result["success"] = true;
            $result["message"] = "Sesion cerrada";

        }
    }else{

        if(isset($_GET['mail'])){
            $result["success"] = true;
            $query = "SELECT * FROM canal WHERE correo='" . $_GET['mail'] . "'";
            $canal = mysqli_query($connection, $query);
            if(!($dato1 = mysqli_fetch_assoc($canal))){
                $result["success"] = false;
                $result["message"] = "No hay canal asociado a ese correo, registrese";
            }else{
                $result["data"] = $dato1;
                unset($result["data"]["correo"]);
                unset($result["data"]["subs"]);
                unset($result["data"]["fecha"]);
            }
                    
        }else{
            $result["success"] = false;
            $result["message"] = "Ingrese un correo válido";
        }
    }

}elseif ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $description = "Sin descripción";
    if(isset($_POST['description'])&&!empty($_POST['description'])){
        $description = $_POST['description'];
    }
    $query = "INSERT INTO canal(correo, usuario, contra, descripcion) VALUES ('$email', '$username', '$password', '$description');";
    $result["success"] = mysqli_query($connection, $query);
    if(!$result["success"]){
        $result["message"] = "Canal NO registrado";
    }else{
        $result["message"] = "Canal registrado satisfactoriamente";
    }

}elseif ($_SERVER["REQUEST_METHOD"] === "PUT") {

    $_PUT = json_decode(file_get_contents("php://input"),true);
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

}elseif ($_SERVER["REQUEST_METHOD"] === "DELETE") {
    
    $_DELETE = json_decode(file_get_contents("php://input"),true);
    $query = "DELETE FROM canal WHERE correo = '".$_DELETE['mail']."';";
    $result["success"] = mysqli_query($connection, $query);
    if(!$result["success"]) {
        $result["message"] = "NO se borro";
    }else{
        $result["message"] = "Se ha eliminado el canal";
    }
    
}

echo json_encode($result);

?>