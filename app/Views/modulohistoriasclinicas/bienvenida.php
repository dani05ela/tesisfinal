<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Inicial</title>
    <link rel="stylesheet" href="<?= base_url('public/modulohistoriasclinicascss/bienvenida.css'); ?>">
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
                    <a href="<?= base_url('/bienvenida'); ?>" class="nav-link active">
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
                    <a href="<?= base_url('/buscadorhc'); ?>" class="nav-link">
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
        <!-- Welcome Card -->
        <div class="welcome-card">
            <img src="https://i.pinimg.com/736x/0c/c7/dd/0cc7dd1e2ce96250fb7d8bd422ad32dc.jpg" alt="Dra. Vivi Zurita">
            <div class="welcome-content">
                <h1>Bienvenida, Dra. Vivi Zurita</h1>
                <p>Que tengas un excelente día de consultas</p>
            </div>
        </div>

        <!-- Recent Patients Card -->
        <div class="patients-card">
            <h2>Pacientes Recientes</h2>
            <div class="patient-list">
                <div class="patient-item">
                    <div class="patient-info">
                        <div class="patient-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="patient-details">
                            <h4>María García</h4>
                            <p>Última consulta: Hace 2 días</p>
                        </div>
                    </div>
                    <div class="patient-action">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <div class="patient-item">
                    <div class="patient-info">
                        <div class="patient-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="patient-details">
                            <h4>Juan Pérez</h4>
                            <p>Última consulta: Hace 3 días</p>
                        </div>
                    </div>
                    <div class="patient-action">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <div class="patient-item">
                    <div class="patient-info">
                        <div class="patient-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="patient-details">
                            <h4>Ana López</h4>
                            <p>Última consulta: Hace 5 días</p>
                        </div>
                    </div>
                    <div class="patient-action">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>