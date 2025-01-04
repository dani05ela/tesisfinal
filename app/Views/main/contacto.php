<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="<?= base_url('public/maincss/contacto.css'); ?>">
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

    <!-- Contact Section -->
    <section class="contact">
        <h2>Información de Contacto</h2>
        <div class="contact-container">
            <div class="contact-info">
                <div class="info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <strong>Ubicación</strong>
                        <p>Sucre 6-70 y Oviedo, Ibarra-Ecuador</p>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-phone-alt"></i>
                    <div>
                        <strong>Teléfono</strong>
                        <p>098 633 7805</p>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <strong>Email</strong>
                        <p>vivianazuritag@hotmail.com</p>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-clock"></i>
                    <div>
                        <strong>Horario de Atención</strong>
                        <p>Lunes a Viernes: 17:30 - 20:00</p>
                        <p>Sábado y Domingo: 9:00 - 20:00</p>
                    </div>
                </div>
            </div>

            <div class="image-container">
                <img src="https://i.pinimg.com/564x/97/ee/89/97ee89a5ae52fa688e5474979add7a6e.jpg"
                    alt="Equipo médico profesional" />
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Citas Médicas. Todos los derechos reservados.</p>
    </footer>
</body>

</html>