<?php
//include ("header.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
    <div class="col-12 col-md-4 p-3 border position-absolute top-50 start-50 translate-middle">
        <div class="col-12">
            <form class="row g-3" action="../Back/crud_php/registro_canal.php" method="POST">
                <div class="mb-3">
                    <h1>Crea tu canal</h1>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="inputEmail4" name="email">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="inputPassword4" name="password">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Nombre del canal</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Así te conocerán" name="username">
                </div>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="description" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Descripción del canal</label>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success">Continuar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>