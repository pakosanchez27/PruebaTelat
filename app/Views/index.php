<?php echo $this->extend('layout/app'); ?>

<?php echo $this->section('contenido'); ?>



<main class="container">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Dashboard</h1>
        <span class="badge badge-primary">Prueba Técnica</span>

    </div>

    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center justify-content-center">
        <div class="col">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 fw-normal">Usuarios</h4>
                </div>
                <div class="card-body">
                    <i class="fas fa-users fa-5x mb-4 text-muted"></i>
                    <a href="<?php echo site_url('registrar') ?>" class="w-100 btn btn-lg btn-outline-primary">Agregar Usuarios</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 fw-normal">Reportes</h4>
                </div>
                <div class="card-body">
                    <i class="fas fa-chart-line fa-5x mb-4 text-muted"></i>
                    <a href="<?php echo site_url('reportes') ?>" class="w-100 btn btn-lg btn-primary">Ver Reportes</a>
                </div>
            </div>
        </div>
    </div>

    <?php if (session()->has('success')) : ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "<?= session('success') ?>",
                showConfirmButton: false,
                timer: 1500
            });
        });
    </script>
<?php endif; ?>
</main>
<?php echo $this->endSection();
