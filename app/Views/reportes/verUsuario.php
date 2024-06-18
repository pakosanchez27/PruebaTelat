<?php echo $this->extend('layout/app'); ?>

<?php echo $this->section('contenido'); ?>

<div class="container p-5">
   
    <div class="d-flex justify-content-between align-items-center">
    <h1 class="mb-4">Detalles del Usuario</h1>
    <a href="<?php echo site_url('/reportes') ?>" class="btn btn-info text-white">Regresar</a>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Usuario ID: <?= $usuario->id ?></h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label fw-bold">Nombre (s)</label>
                    <p><?= $usuario->nombre ?></p>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="apellido_paterno" class="form-label fw-bold">Apellido Paterno</label>
                    <p><?= $usuario->apellido_paterno ?></p>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="apellido_materno" class="form-label fw-bold">Apellido Materno</label>
                    <p><?= $usuario->apellido_materno ?></p>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <p><?= $usuario->email ?></p>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="telefono" class="form-label fw-bold">Teléfono</label>
                    <p><?= $usuario->telefono ?></p>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="sexo" class="form-label fw-bold">Sexo</label>
                    <p><?= $usuario->sexo ?></p>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tipousuario" class="form-label fw-bold">Tipo de Usuario</label>
                    <p><?= $usuario->tipo ?></p>
                </div>
            </div>
            <h3>Direccion</h3>
            <div class="row">

                <div class="col-md-6 mb-3">
                    <label for="calle" class="form-label fw-bold">Calle</label>
                    <p><?= $direccion['calle'] ?></p>

                </div>
                <div class="col-md-6 mb-3">
                    <label for="numero_exterior" class="form-label fw-bold">Número Exterior</label>
                    <p><?= $direccion['numero_ext'] ?></p>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="colonia" class="form-label fw-bold">Colonia</label>
                    <p><?= $direccion['colonia'] ?></p>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="codigo_postal" class="form-label fw-bold">Código Postal</label>
                    <p><?= $direccion['codigo_postal'] ?></p>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="codigo_postal" class="form-label fw-bold">Delegacion o Municipio</label>
                    <p><?= $direccion['ciudad'] ?></p>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="estado" class="form-label fw-bold">Estado</label>
                    <p><?= $direccion['estado'] ?></p>
                </div>
                


            </div>

        </div>
    </div>


</div>


<?php echo $this->endSection();
