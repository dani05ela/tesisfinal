<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Resumen del Paciente</title>
  <link rel="stylesheet" href="<?= base_url('public/modulohistoriasclinicascss/resumenpaciente.css'); ?>">
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
      <a href="<?= base_url('/cerrarsesion'); ?>" class="nav-link">
        <i class="fas fa-sign-out-alt"></i>
        <span>Salir</span>
      </a>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="main-content">
    <!-- Profile Header -->
    <div class="profile-header">
      <div class="profile-header-content">
        <div class="patient-avatar">
          <i class="fas fa-user-circle"></i>
        </div>
        <div class="patient-main-info">
          <h1><?= esc($data['pac_nombres']) . ' ' . esc($data['pac_apellidos']); ?></h1>
          <div class="patient-meta">
            <span><i class="fas fa-birthday-cake"></i> <?= esc($data['pac_edad']); ?> años</span>
            <span><i class="fas fa-phone"></i> <?= esc($data['pac_telefono']); ?></span>
            <span><i class="fas fa-envelope"></i> <?= esc($data['pac_email']); ?></span>
          </div>
        </div>
      </div>

      <!-- Navigation Tabs -->
      <div class="nav-tabs">

        <form action="<?= base_url('/resumenpaciente'); ?>" method="post" style="display: inline;">
          <input type="hidden" name="pac_id" value="<?= esc($data['pac_id']); ?>">
          <button type="submit" class="nav-tab active" style="height: 50px; outline: none;">Resumen del Paciente</button>
        </form>
        <form action="<?= base_url('/historiaclinica'); ?>" method="post" style="display: inline;">
          <input type="hidden" name="pac_id" value="<?= esc($data['pac_id']); ?>">
          <button type="submit" class="nav-tab" style="height: 50px; outline: none;">Historia Clínica</button>
        </form>

      </div>
    </div>

    <!-- Summary Content -->
    <div class="summary-container">
      <div class="summary-grid">
        <div class="summary-section personal-info">
          <h2 class="section-title">
            <i class="fas fa-id-card"></i> Información Personal
          </h2>
          <div class="info-grid">
            <div class="info-item">
              <span class="info-label">Fecha de Nacimiento</span>
              <span class="info-value"><?= esc($data['pac_fechanacimiento']); ?></span>
            </div>
            <div class="info-item">
              <span class="info-label">Estado Civil</span>
              <span class="info-value">
                <?php
                switch ($data['pac_estadocivil']) {
                  case 1:
                    echo 'Soltero/a';
                    break;
                  case 2:
                    echo 'Casado/a';
                    break;
                  case 3:
                    echo 'Divorciado/a';
                    break;
                  case 4:
                    echo 'Viudo/a';
                    break;
                  case 5:
                    echo 'Unión Libre';
                    break;
                  default:
                    echo 'Desconocido';
                    break;
                }
                ?>
              </span>
            </div>

            <div class="info-item">
              <span class="info-label">Dirección</span>
              <span class="info-value"><?= esc($data['pac_direccion']); ?></span>
            </div>
            <div class="info-item">
              <span class="info-label">Contacto de Emergencia</span>
              <span class="info-value"><?= esc($data['pac_nombreemergencia']); ?></span>
              <span class="info-value"><?= esc($data['pac_telefonoemergencia']); ?></span>
            </div>
          </div>
        </div>

        <div class="summary-section medical-history">
          <h2 class="section-title">
            <i class="fas fa-notes-medical"></i> Historia Médica
          </h2>
          <div class="info-grid">
            <div class="info-item full-width">
              <span class="info-label">Antecedentes Personales</span>
              <span class="info-value">
                <ul>
                  <li><?= esc($data['pac_antecedentespersonales']); ?></li>
                </ul>
              </span>
            </div>

            <div class="info-item full-width">
              <span class="info-label">Antecedentes Familiares</span>
              <span class="info-value">
                <ul>
                  <li><?= esc($data['pac_antecedentesfamiliares']); ?></li>
                </ul>
              </span>
            </div>

            <div class="info-item full-width">
              <span class="info-label">Antecedentes Alérgicos</span>
              <span class="info-value">
                <ul>
                  <li><?= esc($data['pac_antecedentesalergicos']); ?></li>
                </ul>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>


<script>
    (function() {
        window.history.pushState(null, "", window.location.href);
        window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
        };
    })();
</script>

</html>