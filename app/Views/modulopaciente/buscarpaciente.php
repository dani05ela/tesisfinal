<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Búsqueda de Pacientes</title>
  <link rel="stylesheet" href="<?= base_url('public/modulopacientecss/buscarpaciente.css'); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap" rel="stylesheet" />
  <style></style>
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
          <a href="<?= base_url('/buscarpaciente'); ?>" class="nav-link active">
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
    <!-- Search Section -->
    <!-- Search Section -->
    <div class="search-section">
      <form action="<?= base_url('/filtrarPacientes'); ?>" method="post" class="search-container">
        <div class="search-box">
          <i class="fas fa-search"></i>
          <input type="text" name="criterio" placeholder="Buscar paciente..." required />
        </div>
        <select class="search-select" name="filtro" required>
          <option value="" disabled selected>Buscar por...</option>
          <option value="cedula">Cédula de identidad</option>
          <option value="nombres">Nombres</option>
          <option value="apellidos">Apellidos</option>
        </select>
        <button type="submit" class="search-button">
          <i class="fas fa-search"></i>
          Buscar
        </button>
      </form>
    </div>


    <!-- Frequent Patients -->
    <!-- Frequent Patients -->
    <div class="frequent-patients">
      <h2>Pacientes</h2>
      <div class="patient-list">
        <?php if (!empty($pacientes)): ?>
          <?php foreach ($pacientes as $paciente): ?>
            <div class="patient-item">
              <div class="patient-info">
                <div class="patient-avatar">
                  <i class="fas fa-user"></i>
                </div>
                <div>
                  <h4><?= esc($paciente['pac_nombres']) . ' ' . esc($paciente['pac_apellidos']); ?></h4>
                  <p>Cédula: <?= esc($paciente['pac_cedula']); ?></p>
                </div>
              </div>
              <!-- Formulario para Ver Historia Clínica -->
              <form method="POST" action="<?= base_url('/resumenpaciente'); ?>">
                <input type="hidden" name="pac_id" value="<?= esc($paciente['pac_id']); ?>" />
                <button type="submit" class="view-history-btn">Ver Historia Clínica</button>
              </form>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p>No se encontraron pacientes.</p>
        <?php endif; ?>
      </div>
    </div>


    <!-- Add Patient Button -->
    <a href="<?= base_url('/nuevoInfoAdmin'); ?>" class="add-patient-btn">
      <i class="fas fa-plus"></i>
      Añadir Nuevo Paciente
    </a>
  </div>
</body>

</html>