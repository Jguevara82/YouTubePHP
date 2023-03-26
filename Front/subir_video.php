<?php
//include ("header.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHPTube - Subir video</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
    <div class="col-12 col-md-4 p-3 border rounded shadow position-absolute top-50 start-50 translate-middle">
        <div class="col-12">
            <form class="row g-3" action="../Back/crud_videos/subir.php" method="POST">
                <div class="mb-3">
                    <h1>Subir video</h1>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" autofocus required>
                        <label for="floatingInput" class="text-secondary">Título</label>
                    </div>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="description" style="height: 100px"></textarea>
                    <label for="floatingTextarea2" class="text-secondary">Descripción</label>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Contraseña" required>
                        <label for="floatingPassword" class="text-secondary">Categoría</label>
                    </div>
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Visibilidad</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Así te conocerán" name="username" required>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success">Continuar</button>
                    <a class="text-primary text-decoration-none  ms-3" href="#">Ya tengo una cuenta</a>
                </div>
                
            </form>
        </div>
    </div>
</body>
</html>