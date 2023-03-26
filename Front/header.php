<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body class="bg-dark">
<nav class="navbar navbar-expand-lg bg-dark bg-gradient navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">YouTube2</a>
    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <form class="d-flex  me-1" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <div class="row">
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <?php
            if(isset($_SESSION['mail'])){
                ?>
                <li>
                    <div class="dropdown">
                        <button class="btn btn-dark-10 dropdown-toggle fw-bold me-2 text-light" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo($_SESSION['mail'])?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="canal.php">Mi Canal</a></li>
                            <li><a class="dropdown-item" href="../Back/crud_php/index.php?mail=<?php echo($_SESSION['mail'])?>">Editar Perfil</a></li>
                            <li><a class="dropdown-item" href="../Back/crud_php/index.php?">Salir</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="subir_video.php">Crear</a>
                </li>
                <?php
            }else{
            ?>
            <li class="nav-item">
            <a class="btn btn-primary" aria-current="page" href="login.php">Acceder</a>
            </li>
            <?php } ?>
        </ul>
        </div>
    </div>
  </div>
</nav>