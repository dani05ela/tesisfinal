<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receta Médica</title>
    <link rel="stylesheet" href="<?= base_url('public/modulohistoriasclinicascss/receta.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap" rel="stylesheet">


    <style>
        @media print {
            body {
                margin: 0;
                padding: 0;
                font-size: 12px;
                color: #000;
                background: none;
            }

            .sidebar,
            .back-button-container {
                display: none;
                /* Ocultar elementos no necesarios en la impresión */
            }

            .main-content {
                width: 100%;
                margin: 0 auto;
                padding: 20px;
            }

            .btn {
                display: none;
                /* Ocultar botones */
            }
        }
    </style>


</head>

<body>
    <!-- Sidebar -->
    <nav class="sidebar">
        <div>
            <div class="user-profile-sidebar">
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-info">
                    <h3>Dra. Vivi Zurita</h3>
                    <p>Médico General</p>
                </div>
            </div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="<?= base_url('/bienvenida'); ?>" class="nav-link">
                        <i class="fas fa-home"></i>
                        <span>Inicio</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/buscarpaciente'); ?>" class="nav-link">
                        <i class="fas fa-hospital-user"></i>
                        <span>Pacientes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/buscadorhc'); ?>" class="nav-link active">
                        <i class="fas fa-file-medical"></i>
                        <span>Historias Clínicas</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="nav-logout">
            <a href="<?= base_url('/cerrarsesion'); ?>" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
                <span>Salir</span>
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="main-content">
            <div class="back-button-container">
                <a href="<?= base_url('/nuevacita'); ?>" class="btn back-btn">
                    <i class="fas fa-arrow-left"></i>
                    Atrás
                </a>
            </div>
            <div class="summary-container prescription-container">
                <form action="<?= base_url('/guardarReceta'); ?>" method="post">
                    <!-- Encabezado de la receta -->
                    <div class="prescription-header">
                        <div class="prescription-logo">
                            <i class="fas fa-heartbeat" style="color: var(--color-peach); font-size: 2.5rem;"></i>
                        </div>
                        <div class="prescription-doctor-info">
                            <h2>Dra. Viviana Zurita G.</h2>
                            <p>Especialista Medicina Familiar y Comunitaria</p>
                            <p>Cel: 098 633 7805</p>
                            <p>Email: vivianazuritag@hotmail.com</p>
                            <p>Dirección: Sucre 6-70 y Oviedo Ibarra Ecuador</p>
                            <p>Registro ACESS: 2002051595</p>
                        </div>
                    </div>

                    <!-- Campo oculto para info_id -->
                    <input type="hidden" id="idConsulta" name="idConsulta" value="<?= esc($idConsulta); ?>" readonly>


                    <!-- Medicamentos -->
                    <div class="prescription-instructions">
                        <h2 class="section-title">Medicamentos</h2>
                        <textarea name="medicamentos" class="form-input" rows="4"
                            placeholder="Escriba aquí los medicamentos"></textarea>
                    </div>

                    <!-- Instrucciones médicas -->
                    <div class="prescription-instructions">
                        <h2 class="section-title">Instrucciones Médicas</h2>
                        <textarea name="instrucciones" class="form-input" rows="4"
                            placeholder="Escriba aquí las instrucciones médicas"></textarea>
                    </div>

                    <!-- Botones de acción -->
                    <div class="prescription-actions">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-primary" onclick="imprimirReceta()">Imprimir
                            Receta</button>
                    </div>
                </form>
            </div>
        </div>


        <script>
            function imprimirReceta() {
                window.print();
            }
        </script>


        <!-- SweetAlert para insert usuario -->
        <?php if (!empty($message)): ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: '<?= $message ?>',
                    confirmButtonText: 'Aceptar',
                });
            </script>
        <?php endif; ?>
</body>

</html>