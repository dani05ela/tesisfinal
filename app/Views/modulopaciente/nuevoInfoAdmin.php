<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nuevo Paciente</title>
    <link rel="stylesheet" href="<?= base_url('public/modulopacientecss/nuevopaciente.css'); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap" rel="stylesheet" />
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
            <a href="<?= base_url('/inicio'); ?>" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
                <span>Salir</span>
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="form-container">
            <h1 class="form-title">Registro de Nuevo Paciente</h1>
            <form action="<?= base_url('/guardarinfoAdmin'); ?>" method="POST">
                <div class="form-section">
                    <h2 class="section-title">Información Administrativa</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Número de Historia Clínica</label>
                            <input type="text" class="form-input" name="hc_id" value="<?= $numeroHistoriaClinica ?>"
                                required readonly />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Fecha de Creación</label>
                            <input type="date" class="form-input" name="fecha_creacion" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Institución</label>
                            <input type="text" class="form-input" name="institucion" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nombre Médico Responsable</label>
                            <input type="text" class="form-input" name="medico_responsable" required />
                        </div>
                    </div>
                </div>
                <div class="button-container">
                    <button type="submit" class="form-button">Guardar Informacion Administrativa</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>