<?php echo $this->extend('layout/app'); ?>

<?php echo $this->section('contenido'); ?>


<div class="container w-100">

<div class="d-flex justify-content-between p-3">
  <h3>Registros de  Usuarios</h3>
  <form action="<?= site_url('reportes/exportar') ?>" method="post">
            <button type="submit" class="btn btn-info">Exportar Info</button>
        </form>
</div>

<div class="tabla">
    <?php if (empty($usuarios)) : ?>
        <p>No hay usuarios registrados.</p>
    <?php else : ?>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Estatus</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario) : ?>
                    <tr>
                        <td><?php echo $usuario['id']; ?></td>
                        <td><?php echo $usuario['nombre']; ?></td>
                        <td><?php echo $usuario['apellido_paterno']; ?></td>
                        <td><?php echo $usuario['email']; ?></td>
                        <td>
                            <?php if ($usuario['estatus'] == 1) : ?>
                                <span class="badge bg-success">Activo</span>
                            <?php else : ?>
                                <span class="badge bg-danger">Inactivo</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo site_url('reportes/ver/' . $usuario['id']); ?>" class="btn btn-info btn-sm">Ver</a>
                            <a href="<?php echo site_url('reportes/editar/' . $usuario['id']); ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="#" class="btn btn-danger btn-sm" onclick="confirmDelete()">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
</div>

</div>

<script>
     function confirmDelete() {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta acción no se puede deshacer",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                <?php if (!empty($usuarios)) : ?>
                    window.location.href = '<?= site_url('reportes/eliminar/' . $usuario['id']) ?>';
                <?php else : ?>
                    // Si no hay usuarios, redirigir a /reportes
                    window.location.href = '<?= site_url('reportes') ?>';
                <?php endif; ?>
            }
        });
    }
</script>
<?php if (session()->has('actualizado')) : ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "<?= session('actualizado') ?>",
                showConfirmButton: false,
                timer: 1500
            });
        });
    </script>
<?php endif; ?>
<?php if (session()->has('desactivado')) : ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "<?= session('desactivado') ?>",
                showConfirmButton: false,
                timer: 1500
            });
        });
    </script>
<?php endif; ?>
<?php echo $this->endSection();
