<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="<?= base_url('public/iniciosesioncss/iniciosesion.css'); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    <!-- Login Section -->
    <section class="login">
        <div class="login-container">
            <h2>Iniciar Sesión</h2>
            <form class="login-form" action="<?= base_url('/login'); ?>" method="POST">
                <div class="form-group">
                    <label for="username">Usuario</label>
                    <i class="fas fa-user"></i>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" required>
                </div>

                <button type="submit">Ingresar</button>

                <div class="forgot-password">
                    <a href="#">¿Olvidaste tu contraseña?</a>
                </div>

                <div class="register-link">
                    <p>¿No tienes una cuenta? <a href="<?= base_url('/registrousu'); ?>">Regístrate</a></p>
                </div>
            </form>
        </div>
    </section>

    <?php if (session()->has('error')): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: '<?= session('error'); ?>',
                confirmButtonText: 'Aceptar',
                timer: 3000,
                timerProgressBar: true
            });
        </script>
    <?php endif; ?>

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


    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Citas Médicas. Todos los derechos reservados.</p>
    </footer>
</body>

</html>