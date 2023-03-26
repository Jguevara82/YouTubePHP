<?php
session_start();
//include ("header.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
    <div class="col-12 col-xl-4 p-3 position-absolute border border-3 border-white-50 shadow p-3 mb-5 bg-light rounded top-50 start-50 translate-middle bg-light bg-gradient">
        <div class="col-12">
            <form action="../Back/crud_php/index.php" method="GET">
                <div class="mb-3">
                    <h1>Ingresa a YouTube 2</h1>
                </div>
                <div class="mb-3">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" autofocus required>
                        <label for="floatingInput">Correo electrónico</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Contraseña" required>
                        <label for="floatingPassword">Contraseña</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary shadow">Acceder</button>
                <a class="btn btn-secondary shadow" href="registro.php">Registrarme</a>
            </form>
        </div>
    </div>
</body>
</html>