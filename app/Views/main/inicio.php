<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
    <link rel="stylesheet" href="<?= base_url('public/maincss/inicio.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <img src="/api/placeholder/150/50" alt="Logotipo" />
        </div>
        <ul class="nav-links">
            <li><a href="<?= base_url('/inicio'); ?>">Inicio</a></li>
            <li><a href="<?= base_url('/servicios'); ?>">Servicios</a></li>
            <li><a href="<?= base_url('/contacto'); ?>">Contacto</a></li>
            <li><a href="<?= base_url('/iniciosesion'); ?>">Iniciar sesión</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1>Tu salud es nuestra prioridad</h1>
                <p>Agenda tu cita médica. Conectamos pacientes con los mejores profesionales de la salud.</p>

                <div class="features">
                    <div class="feature-card">
                        <i class="fas fa-clock"></i>
                        <h3>Ahorra Tiempo</h3>
                        <p>Agenda en minutos</p>
                    </div>
                    <div class="feature-card">
                        <i class="fas fa-user-md"></i>
                        <h3>Especialista</h3>
                        <p>Especialista Medicina Familiar y Comunitaria</p>
                    </div>
                    <div class="feature-card">
                        <i class="fas fa-calendar-check"></i>
                        <h3>Flexibilidad</h3>
                        <p>Horarios convenientes</p>
                    </div>
                </div>
            </div>
            <div class="hero-image">
                <img src="https://i.pinimg.com/564x/2e/c9/1a/2ec91a028ddaf3b9fea3a16ec75430ef.jpg"
                    alt="Doctor con paciente" />
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Citas Médicas. Todos los derechos reservados.</p>
    </footer>
</body>

</html>