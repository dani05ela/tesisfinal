<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="<?= base_url('public/iniciosesioncss/registrousu.css'); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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

    <!-- Register Section -->
    <section class="register">
        <div class="register-container">
            <h2>Crea tu cuenta médica</h2>
            <form class="register-form" action="#" method="post">
                <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <i class="fas fa-user"></i>
                    <input type="text" id="nombres" name="nombres" placeholder="Ingresa tus nombres" required>
                </div>

                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <i class="fas fa-user"></i>
                    <input type="text" id="apellidos" name="apellidos" placeholder="Ingresa tus apellidos" required>
                </div>

                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" required>
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <i class="fas fa-phone"></i>
                    <input type="tel" id="telefono" name="telefono" placeholder="Ingresa tu teléfono" required>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="Crea tu contraseña" required>
                </div>

                <div class="form-group">
                    <label for="confirm-password">Confirmar Contraseña</label>
                    <i class="fas fa-lock"></i>
                    <input type="password" id="confirm-password" name="confirm-password"
                        placeholder="Confirma tu contraseña" required>
                </div>

                <button type="submit">Crear cuenta</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Citas Médicas. Todos los derechos reservados.</p>
    </footer>
</body>

</html>