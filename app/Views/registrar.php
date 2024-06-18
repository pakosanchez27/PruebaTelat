<?php echo $this->extend('layout/app'); ?>

<?php echo $this->section('contenido'); ?>



<main class="container">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Registra un Nuevo Usuario</h1>
        <span class="badge badge-primary">Prueba Técnica</span>

    </div>

    <div class="row row-cols-1 row-cols-md-2 mb-3 text-center justify-content-center">


        <form action="<?= site_url('registrar/save') ?>" method="post" class="needs-validation" novalidate>
            <h2>Datos Generales</h2>


            <div class="row">
                <div class="col-12 mb-3">
                    <label for="nombre" class="form-label">Nombre (s)</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= set_value('nombre') ?>">
                    <?php if (validation_errors('nombre')) :?>
                    <div class="text-danger text-left mt-3"><?php echo validation_show_error('nombre') ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-6 mb-3">
                    <label for="apellido_paterno" class="form-label">Apellido Paterno</label>
                    <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="<?= set_value('apellido_paterno') ?>">
                    <?php if (validation_errors('apellido_paterno')) :?>
                    <div class="text-danger text-left mt-3"><?php echo validation_show_error('apellido_paterno') ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-6 mb-3">
                    <label for="apellido_materno" class="form-label">Apellido Materno</label>
                    <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="<?= set_value('apellido_materno') ?>">
                    
                </div>
                <div class="col-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="<?= set_value('email') ?>">
                    <?php if (validation_errors('email')) :?>
                    <div class="text-danger text-left mt-3"><?php echo validation_show_error('email') ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-6 mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono" value="<?= set_value('telefono') ?>">
                    <?php if (validation_errors('telefono')) :?>
                    <div class="text-danger text-left mt-3"><?php echo validation_show_error('telefono') ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-6 mb-3">
                    <label for="sexo" class="form-label">Sexo:</label>
                    <select class="form-control" id="sexo" name="sexo" required>
                        <option disabled selected>Selecciona el sexo</option>
                        <option value="masculino" <?= set_select('sexo', 'masculino'); ?>>Masculino</option>
                        <option value="femenino" <?= set_select('sexo', 'femenino'); ?>>Femenino</option>
                        <option value="otro" <?= set_select('sexo', 'otro'); ?>>Otro</option>
                    </select>
                    <?php if (validation_errors('sexo')) :?>
                    <div class="text-danger text-left mt-3"><?php echo validation_show_error('sexo') ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-6 mb-3">
                    <label for="tipoUsuario" class="form-label">Tipo de Usuario:</label>
                    <select name="tipoUsuario" id="tipoUsuario" class="form-select" required>
                        <option disabled selected>Selecciona el tipo de usuario</option>
                        <?php foreach ($tiposUsuarios as $tipoUsuario) : ?>
                            <option value="<?= $tipoUsuario['id'] ?>" <?= set_select('tipoUsuario', $tipoUsuario['id']); ?>><?= $tipoUsuario['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (validation_errors('tipoUsuario')) :?>
                    <div class="text-danger text-left mt-3"><?php echo validation_show_error('tipoUsuario') ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <h2>Dirección</h2>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="calle" class="form-label">Calle:</label>
                    <input type="text" class="form-control" id="calle" name="calle" value="<?= set_value('calle') ?>">
                    <?php if (validation_errors('calle')) :?>
                    <div class="text-danger text-left mt-3"><?php echo validation_show_error('calle') ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <label for="numero" class="form-label">Número Exterior:</label>
                    <input type="text" class="form-control" id="numero" name="numero" value="<?= set_value('numero') ?>">
                    <?php if (validation_errors('calle')) :?>
                    <div class="text-danger text-left mt-3"><?php echo validation_show_error('calle') ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="colonia" class="form-label">Colonia:</label>
                    <input type="text" class="form-control" id="colonia" name="colonia" value="<?= set_value('colonia') ?>">
                    <?php if (validation_errors('colonia')) :?>
                    <div class="text-danger text-left mt-3"><?php echo validation_show_error('colonia') ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <label for="ciudad" class="form-label">Delegación:</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?= set_value('ciudad') ?>">
                    <?php if (validation_errors('ciudad')) :?>
                    <div class="text-danger text-left mt-3"><?php echo validation_show_error('ciudad') ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="estado" class="form-label">Estado:</label>
                    <input type="text" class="form-control" id="estado" name="estado" value="<?= set_value('estado') ?>">
                    <?php if (validation_errors('estado')) :?>
                    <div class="text-danger text-left mt-3"><?php echo validation_show_error('estado') ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <label for="codigo_postal" class="form-label">Código Postal:</label>
                    <input type="text" class="form-control" id="codigoPostal" name="codigo_postal" value="<?= set_value('codigo_postal') ?>">
                    <?php if (validation_errors('codigo_postal')) :?>
                    <div class="text-danger text-left mt-3"><?php echo validation_show_error('codigo_postal') ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-info text-white w-100">Guardar</button>
            </div>

        </form>


</main>
<?php echo $this->endSection();
