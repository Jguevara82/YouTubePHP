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
<body>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
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
                ?><li class="nav-item pt-1">
                <a class="align-self-center lead text-light me-2 align-middle fs-6 fw-bold text-muted text-decoration-none"  href="login.php"><?php echo($_SESSION['mail'])?></a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-secondary me-2" aria-current="page" href="../Back/crud_php/logout.php">Salir</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Crear</a>
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