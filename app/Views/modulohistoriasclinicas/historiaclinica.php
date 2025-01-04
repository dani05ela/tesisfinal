<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historia Clínica</title>
    <link rel="stylesheet" href="<?= base_url('public/modulohistoriasclinicascss/historiaclinica.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap" rel="stylesheet">
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
        <div class="summary-container">
            <!-- Información Administrativa -->
            <div class="form-section">
                <h2 class="section-title">Información Administrativa</h2>
                <div class="form-grid">
                    <div class="info-item">
                        <span class="info-label">Número de Historia Clínica</span>
                        <span class="info-value">HC-2024-0001</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Fecha de Creación</span>
                        <span class="info-value">10/11/2024</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Institución</span>
                        <span class="info-value">Centro Médico San José</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Nombre Médico Responsable</span>
                        <span class="info-value">Dra. Vivi Zurita</span>
                    </div>
                </div>
            </div>

            <!-- Datos Personales -->
            <div class="form-section">
                <h2 class="section-title">Datos Personales</h2>
                <div class="form-grid">
                    <div class="info-item">
                        <span class="info-label">Apellidos</span>
                        <span class="info-value">Pérez González</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Nombres</span>
                        <span class="info-value">Juan Antonio</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Fecha de Nacimiento</span>
                        <span class="info-value">15/03/1985</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Edad</span>
                        <span class="info-value">38 años</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Género</span>
                        <span class="info-value">Masculino</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Cédula</span>
                        <span class="info-value">1234567890</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Nivel de Instrucción</span>
                        <span class="info-value">Superior</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Ocupación</span>
                        <span class="info-value">Ingeniero</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Estado Civil</span>
                        <span class="info-value">Casado</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Teléfono</span>
                        <span class="info-value">+54 9 11 1234 5678</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Email</span>
                        <span class="info-value">juan.perez@email.com</span>
                    </div>
                    <div class="info-item full-width">
                        <span class="info-label">Dirección</span>
                        <span class="info-value">Av. Libertador 1234, Buenos Aires, Argentina</span>
                    </div>
                </div>
            </div>

            <!-- Datos Médicos -->
            <div class="form-section">
                <h2 class="section-title">Datos Médicos</h2>
                <div class="form-grid">
                    <div class="info-item">
                        <span class="info-label">Peso Actual (kg)</span>
                        <span class="info-value">75.5</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Talla (cm)</span>
                        <span class="info-value">175.0</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Índice de Masa Corporal</span>
                        <span class="info-value">24.6</span>
                    </div>
                    <div class="info-item full-width">
                        <span class="info-label">Antecedentes Alérgicos</span>
                        <span class="info-value">Ninguno</span>
                    </div>
                    <div class="info-item full-width">
                        <span class="info-label">Cirugías Previas</span>
                        <span class="info-value">Apendicectomía (2010)</span>
                    </div>
                    <div class="info-item full-width">
                        <span class="info-label">Antecedentes Personales</span>
                        <span class="info-value">Hipertensión controlada, sin otros antecedentes relevantes</span>
                    </div>
                    <div class="info-item full-width">
                        <span class="info-label">Antecedentes Familiares</span>
                        <span class="info-value">Padre con diabetes tipo 2, madre con hipertensión</span>
                    </div>
                    <div class="info-item full-width">
                        <span class="info-label">Exámenes Previos</span>
                        <span class="info-value">Examen de sangre general (01/2024) - Resultados normales</span>
                    </div>
                </div>
            </div>

            <!-- Contacto de Emergencia -->
            <div class="form-section">
                <h2 class="section-title">Contacto de Emergencia</h2>
                <div class="form-grid">
                    <div class="info-item">
                        <span class="info-label">Nombre Completo</span>
                        <span class="info-value">María Pérez</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Relación</span>
                        <span class="info-value">Madre</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Teléfono</span>
                        <span class="info-value">+54 9 11 9876 5432</span>
                    </div>
                </div>
            </div>

            <!-- Botón Editar Historia Clínica -->
            <button class="btn btn-secondary">Editar Historia Clínica</button>

            <!-- Historial de Consultas -->
            <div class="consultation-history">
                <h2 class="section-title">Historial de Consultas</h2>
                <div class="consultation-list">
                    <div class="consultation-item">
                        <span class="consultation-info">Consulta 1 - 15/11/2024</span>
                        <button class="btn btn-secondary" style="width: auto; padding: 0.5rem 1rem;">Editar</button>
                    </div>
                    <div class="consultation-item">
                        <span class="consultation-info">Consulta 2 - 20/12/2024</span>
                        <button class="btn btn-secondary" style="width: auto; padding: 0.5rem 1rem;">Editar</button>
                    </div>
                </div>
            </div>

            <!-- Botón Nueva Consulta -->
            <a href="<?= base_url('/nuevacita'); ?>" class="btn btn-primary">
                Nueva Consulta
            </a>

        </div>
    </div>
</body>

</html>