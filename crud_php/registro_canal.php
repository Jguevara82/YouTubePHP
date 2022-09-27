<?php
    include ("db.php");
    
    $email = $_GET['email'];
    $password = $_GET['password'];
    $username = $_GET['username'];
    $description = "Sin descripción";
    if(isset($_GET['description'])){
        $description = $_GET['description'];
    }
    $query = "INSERT INTO canal(correo, usuario, contra, descripcion) VALUES ('$email', '$username', '$password', '$description');";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Failed to insert INTO");
    }else{
        echo "Se ha creado el canal $username asociado al correo $email";
    }
?>