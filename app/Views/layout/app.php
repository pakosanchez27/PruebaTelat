<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Prueba Técnica">
        <meta name="author" content="Natacha Alvarez">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <title>Telat - Prueba Técnica</title>

        <!-- Favicon -->
        <link rel="icon" href="<?php echo base_url('favicon.ico'); ?>">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </head>
    <body>

        <header class="shadow-sm">

            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <a class="navbar-brand" href="<?php echo base_url(); ?>">
                    <img class="mb-2" src="<?php echo base_url('assets/img/logo.png'); ?>" alt="" width="40" height="40"> Telat 
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav ">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo site_url('/') ?>">Home <span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('/registrar') ?>">Registrar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('/reportes') ?>">Reportes</a>
                        </li>
                    </ul>

                </div>
            </nav>

        </header>



   <?php echo $this->renderSection('contenido') ?>


   



   <footer class="pt-4 border-top container">
    <div class="row">
        <div class="col-12 col-md text-center">
            <img class="mb-2" src="<?php echo base_url('assets/img/logo.png'); ?>" alt="" width="40" height="40">
            <p class="mb-3 text-muted">Telat © 2021 Todos los derechos reservados.</p>
        </div>
    </div>
</footer>
<script src="../assets/js/api.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
