<?php
include ("header.php");
$datos = $_SESSION['data'];
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Seguro?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        ¿Estás seguro de querer eliminar tu canal? ¡Esta acción NO se puese deshacer!
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form action="../Back/crud_php/index.php" method="POST">
            <input type="hidden" name="confirmation" value=true>
            <button type="submit" class="btn btn-primary">Eliminar</button>
        </form>
    </div>
    </div>
</div>
</div>
<div class="col-12 col-md-4 p-3 border rounded shadow position-absolute top-50 start-50 translate-middle">
        <div class="col-12">
            <form class="row g-3" action="../Back/crud_php/index.php" method="POST">
                <div class="mb-3">
                    <h1 class="text-bg-dark">Edita tu canal</h1>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="email" readonly class="form-control-plaintext bg-dark text-light" id="floatingInput" name="email" value="<?php echo $_SESSION['mail'];?>" disabled required>
                        <label for="floatingInput" class="text-secondary text-light">Correo electrónico</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="password" class="form-control bg-dark text-light" id="floatingPassword" name="password" value="<?php echo $datos['contra'];?>" placeholder="Contraseña" required>
                        <label for="floatingPassword" class="text-secondary text-light">Contraseña</label>
                    </div>
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label text-light">Nombre del canal</label>
                    <input type="text" class="form-control bg-dark text-light" id="inputAddress" placeholder="Así te conocerán" name="username" value="<?php echo $datos['usuario'];?>" required>
                </div>
                <div class="form-floating">
                    <?php
                    if($datos['descripcion']!="Sin descripción"){
                        ?><textarea class="form-control bg-dark text-light" placeholder="Leave a comment here" id="floatingTextarea2" name="description" style="height: 100px"><?php echo $datos['descripcion'];?></textarea><?php
                    }else{
                        ?><textarea class="form-control bg-dark text-light" placeholder="Leave a comment here" id="floatingTextarea2" name="description" style="height: 100px"></textarea><?php
                    }
                    ?>
                    <label for="floatingTextarea2" class="text-secondary">Descripción del canal</label>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success">Continuar</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Darme de baja</button>
                    
                </div>
                
            </form>
        </div>
    </div>