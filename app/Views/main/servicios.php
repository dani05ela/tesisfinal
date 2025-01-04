<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Servicios</title>
  <link rel="stylesheet" href="<?= base_url('public/maincss/servicios.css'); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap" rel="stylesheet" />
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

  <!-- Services Section -->
  <section class="services">
    <div class="services-container">
      <h2>Nuestros Servicios Médicos</h2>
      <p class="services-intro">
        Ofrecemos una amplia gama de servicios médicos de alta calidad,
        respaldados por profesionales altamente calificados y tecnología de
        última generación.
      </p>

      <div class="service-grid">
        <div class="service-card">
          <i class="fas fa-stethoscope service-icon"></i>
          <h3>Consulta General</h3>
          <p>
            Atención integral para pacientes de todas las edades. Diagnóstico
            y tratamiento de enfermedades comunes y prevención.
          </p>
          <a href="<?= base_url('/contacto'); ?>" class="learn-more">Más información →</a>
        </div>

        <div class="service-card">
          <i class="fas fa-clipboard-check service-icon"></i>
          <h3>Chequeo Médico Anual</h3>
          <p>
            Revisión general de la salud, exámenes de rutina y recomendaciones
            para mantener un estilo de vida saludable.
          </p>
          <a href="<?= base_url('/contacto'); ?>" class="learn-more">Más información →</a>
        </div>

        <div class="service-card">
          <i class="fas fa-heartbeat service-icon"></i>
          <h3>Control de Enfermedades Crónicas</h3>
          <p>
            Seguimiento y tratamiento personalizado para condiciones crónicas
            como diabetes, hipertensión y asma.
          </p>
          <a href="<?= base_url('/contacto'); ?>" class="learn-more">Más información →</a>
        </div>

        <div class="service-card">
          <i class="fas fa-syringe service-icon"></i>
          <h3>Vacunación</h3>
          <p>
            Aplicación de vacunas para todas las edades según el calendario de
            vacunación recomendado.
          </p>
          <a href="<?= base_url('/contacto'); ?>" class="learn-more">Más información →</a>
        </div>

        <div class="service-card">
          <i class="fas fa-baby service-icon"></i>
          <h3>Control de Embarazo</h3>
          <p>
            Seguimiento integral y personalizado durante el embarazo,
            garantizando la salud de la madre y el bebé en cada etapa.
          </p>
          <a href="<?= base_url('/contacto'); ?>" class="learn-more">Más información →</a>
        </div>

        <div class="service-card">
          <i class="fas fa-venus-mars service-icon"></i>
          <h3>Planificación Familiar</h3>
          <p>
            Asesoramiento y consulta especializada para métodos
            anticonceptivos, salud reproductiva y planificación familiar.
          </p>
          <a href="<?= base_url('/contacto'); ?>" class="learn-more">Más información →</a>
        </div>

        <div class="service-card">
          <i class="fas fa-hand-holding-medical service-icon"></i>
          <h3>Atención Domiciliaria</h3>
          <p>
            Servicios médicos a domicilio para pacientes que no pueden
            trasladarse al centro médico.
          </p>
          <a href="<?= base_url('/contacto'); ?>" class="learn-more">Más información →</a>
        </div>

        <div class="service-card">
          <i class="fas fa-file-medical service-icon"></i>
          <h3>Atención a Pacientes con Morbilidad</h3>
          <p>
            Manejo integral y personalizado de pacientes con múltiples
            condiciones de salud, enfocado en mejorar su calidad de vida.
          </p>
          <a href="<?= base_url('/contacto'); ?>" class="learn-more">Más información →</a>
        </div>
      </div>
    </div>
  </section>
</body>

</html>