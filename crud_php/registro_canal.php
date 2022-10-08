<?php
    include ("db.php");
    
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
    echo json_encode($result);
?>