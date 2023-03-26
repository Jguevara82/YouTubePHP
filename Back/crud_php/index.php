<?php
    //include ("db.php");
    session_start();
    switch ($_SERVER['REQUEST_METHOD']){
        case 'GET': {
            if(isset($_GET['password'])){
                if(isset($_SESSION['mail'])){
                    $requestUri='http://127.0.0.1/Proyecto%20YouTube/Back/crud_php/login.php?session=' . $_SESSION['mail'] . '&email=' . $_GET['email'] . '&password=' . $_GET['password'];
                }else{
                    $requestUri='http://127.0.0.1/Proyecto%20YouTube/Back/crud_php/login.php?email=' . $_GET['email'] . '&password=' . $_GET['password'];
                }
                $json = json_decode(file_get_contents($requestUri),true);
                if($json['success']){
                    $_SESSION['mail']=$json['mail'];
                    $_SESSION['usuario']=$json['user'];
                    ?>
                    <head>
                        <meta http-equiv="Refresh" content="0; URL=../../Front/index.php" />
                    </head>
                <?php
                }else{
                    ?>
                    <head>
                        <meta http-equiv="Refresh" content="0; URL=../../Front/login.php" />
                    </head>
                <?php
                }
                exit();
            }else if(isset($_GET['mail'])){
                $requestUri='http://127.0.0.1/Proyecto%20YouTube/Back/crud_php/ver_canal.php?mail=' . $_GET['mail'];
                $json = json_decode(file_get_contents($requestUri),true);
                if($json['success']){
                    $_SESSION['data'] = $json['data'];
                    ?>
                    <head>
                        <meta http-equiv="Refresh" content="0; URL=../../Front/cuenta.php" />
                    </head>
                <?php
                }else{
                    ?>
                    <head>
                        <meta http-equiv="Refresh" content="0; URL=../../Front/index.php" />
                    </head>
                <?php
                }
                exit();
            }else{
                session_destroy();
                ?>
                    <head>
                        <meta http-equiv="Refresh" content="0; URL=../../Front/index.php" />
                    </head>
                <?php
                exit();
            }
            break;
        }
        case 'POST': {
            if(isset($_POST['confirmation'])){
                if(isset($_SESSION['mail'])){
                    $_POST['session'] = $_SESSION['mail'];
                }
                unset($_POST['confirmation']);
                $defaults = array(
                    CURLOPT_URL => 'http://127.0.0.1/Proyecto%20YouTube/Back/crud_php/eliminar_canal.php',
                    CURLOPT_CUSTOMREQUEST => "DELETE",
                    CURLOPT_POSTFIELDS => json_encode($_POST),
                    CURLOPT_RETURNTRANSFER => true
                    );
                $ch = curl_init();
                curl_setopt_array($ch, ($defaults));
                $json = curl_exec($ch);
                if(curl_error($ch)) {
                    fwrite($fp, curl_error($ch));
                }
                curl_close($ch);
                //echo $json;
                $json = json_decode($json, true);
                if($json['success']) {
                    session_destroy();
                    ?>
                    <head>
                        <meta http-equiv="Refresh" content="0; URL=../../Front/index.php" />
                    </head>
                    <?php
                    exit();
                }else{
                    ?>
                    <head>
                        <meta http-equiv="Refresh" content="0; URL=../../Front/cuenta.php" />
                    </head>
                    <?php
                    exit();
                }
            }
            if(isset($_POST['email'])){
                $defaults = array(
                    CURLOPT_URL => 'http://127.0.0.1/Proyecto%20YouTube/Back/crud_php/registro_canal.php',
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => http_build_query($_POST),
                    CURLOPT_RETURNTRANSFER => true
                    );
                $ch = curl_init();
                curl_setopt_array($ch, ($defaults));
                $json = curl_exec($ch);
                if(curl_error($ch)) {
                    fwrite($fp, curl_error($ch));
                }
                curl_close($ch);
                //curl_setopt($curl, CURLOPT_URL,$requestUri);
                $json = json_decode($json, true);
                if($json['success']) {
                    ?>
                    <head>
                        <meta http-equiv="Refresh" content="0; URL=../../Front/login.php" />
                    </head>
                    <?php
                    exit();
                }else{
                    ?>
                    <head>
                        <meta http-equiv="Refresh" content="0; URL=../../Front/registro.php" />
                    </head>
                    <?php
                    exit();
                }
            }else{
                if(isset($_SESSION['mail'])){
                    $_POST['session'] = $_SESSION['mail'];
                }
                $defaults = array(
                    CURLOPT_URL => 'http://127.0.0.1/Proyecto%20YouTube/Back/crud_php/editar_canal.php',
                    CURLOPT_CUSTOMREQUEST => "PUT",
                    CURLOPT_POSTFIELDS => json_encode($_POST),
                    CURLOPT_RETURNTRANSFER => true
                    );
                $ch = curl_init();
                curl_setopt_array($ch, ($defaults));
                $json = curl_exec($ch);
                if(curl_error($ch)) {
                    fwrite($fp, curl_error($ch));
                }
                curl_close($ch);
                //echo $json;
                $json = json_decode($json, true);
                if($json['success']) {
                    ?>
                    <head>
                        <meta http-equiv="Refresh" content="0; URL=../../Front/canal.php" />
                    </head>
                    <?php
                    exit();
                }else{
                    ?>
                    <head>
                        <meta http-equiv="Refresh" content="0; URL=../../Front/cuenta.php" />
                    </head>
                    <?php
                    exit();
                }
            }
            
            break;
        }
        case 'DELETE':{
            header('eliminar_canal.php');
            break;
        }
    }

?>