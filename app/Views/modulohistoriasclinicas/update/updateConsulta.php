<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nueva Consulta</title>
  <link rel="stylesheet" href="<?= base_url('public/modulohistoriasclinicascss/nuevacita.css'); ?>" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap" rel="stylesheet" />
</head>

<body>
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

  <div class="main-content">
    <div class="back-button-container">
      <a href="<?= base_url('/historiaclinica'); ?>" class="btn back-btn">
        <i class="fas fa-arrow-left"></i>
        Atrás
      </a>
    </div>
    <div class="summary-container">
      <!-- Consulta Details -->
      <form action="<?= base_url('/actualizarconsulta'); ?>" method="POST">
        <input type="hidden" name="info_id" value="<?= $datos[0]['info_id']; ?>" />
        <input type="hidden" name="con_id" value="<?= $datos[0]['con_id']; ?>" />
        <div class="form-section">
          <h2 class="section-title">Generar Consulta</h2>
          <div class="form-grid">
            <div class="info-item">
              <span class="info-label">Fecha de Consulta</span>
              <input type="date" name="fechaConsulta" class="form-input" value="<?= $datos[0]['con_fechaconsulta']; ?>"
                required />
            </div>
            <div class="info-item full-width">
              <span class="info-label">Motivo de la Consulta</span>
              <textarea name="motivoConsulta" class="form-input" rows="3"
                required><?= $datos[0]['con_motivoconsulta']; ?></textarea>
            </div>
            <div class="info-item full-width">
              <span class="info-label">Síntomas Actuales</span>
              <textarea name="sintomas" class="form-input" rows="3"
                required><?= $datos[0]['con_sintomas']; ?></textarea>
            </div>
          </div>
        </div>

        <!-- Signos Vitales -->
        <div class="form-section">
          <h2 class="section-title">Signos Vitales</h2>
          <div class="form-grid">
            <div class="info-item">
              <span class="info-label">Presión Arterial (mmHg)</span>
              <input type="text" name="presionArterial" class="form-input"
                value="<?= $datos[0]['con_presionarterial']; ?>" placeholder="ej. 120/80" required />
            </div>
            <div class="info-item">
              <span class="info-label">Frecuencia Cardíaca (bpm)</span>
              <input type="number" name="frecuenciaCardiaca" class="form-input"
                value="<?= $datos[0]['con_frecuenciacardiaca']; ?>" required />
            </div>
            <div class="info-item">
              <span class="info-label">Temperatura (°C)</span>
              <input type="number" step="0.1" name="temperatura" class="form-input"
                value="<?= $datos[0]['con_temperatura']; ?>" required />
            </div>
            <div class="info-item">
              <span class="info-label">Peso (kg)</span>
              <input type="number" step="0.1" name="peso" class="form-input" value="<?= $datos[0]['con_peso']; ?>"
                required />
            </div>
            <div class="info-item">
              <span class="info-label">Altura (cm)</span>
              <input type="number" name="altura" class="form-input" value="<?= $datos[0]['con_altura']; ?>" required />
            </div>
          </div>
        </div>

        <!-- Interrogatorio Dirigido -->
        <div class="form-section">
          <h2 class="section-title">Interrogatorio Dirigido</h2>
          <div class="form-grid">
            <div class="info-item full-width">
              <textarea name="interrogatorio" class="form-input" rows="4" placeholder="Descripción del interrogatorio"
                required><?= $datos[0]['con_interrogatorio']; ?></textarea>
            </div>
          </div>
        </div>

        <div class="form-section">
          <h2 class="section-title">Exámenes</h2>
          <div class="exam-checklist">
            <div class="checkbox-group">
              <h3>Análisis de Laboratorio</h3>
              <label>
                <input type="checkbox" name="examenes[]" value="1" <?= in_array('1', $examenesSeleccionados) ? 'checked' : '' ?> />
                Biometría Hemática Completa
              </label>
              <label>
                <input type="checkbox" name="examenes[]" value="2" <?= in_array('2', $examenesSeleccionados) ? 'checked' : '' ?> />
                Química Sanguínea
              </label>
              <label>
                <input type="checkbox" name="examenes[]" value="3" <?= in_array('3', $examenesSeleccionados) ? 'checked' : '' ?> />
                Examen General de Orina
              </label>
              <label>
                <input type="checkbox" name="examenes[]" value="4" <?= in_array('4', $examenesSeleccionados) ? 'checked' : '' ?> />
                Perfil Hepático
              </label>
              <label>
                <input type="checkbox" name="examenes[]" value="5" <?= in_array('5', $examenesSeleccionados) ? 'checked' : '' ?> />
                Perfil Tiroideo
              </label>
              <label>
                <input type="checkbox" name="examenes[]" value="6" <?= in_array('6', $examenesSeleccionados) ? 'checked' : '' ?> />
                Hemoglobina Glucosilada (HbA1c)
              </label>
              <label>
                <input type="checkbox" name="examenes[]" value="7" <?= in_array('7', $examenesSeleccionados) ? 'checked' : '' ?> />
                Electrolitos Séricos
              </label>
            </div>
            <div class="checkbox-group">
              <h3>Exámenes de Imagen</h3>
              <label>
                <input type="checkbox" name="examenes[]" value="8" <?= in_array('8', $examenesSeleccionados) ? 'checked' : '' ?> />
                Radiografía de Tórax
              </label>
              <label>
                <input type="checkbox" name="examenes[]" value="9" <?= in_array('9', $examenesSeleccionados) ? 'checked' : '' ?> />
                Ultrasonido Abdominal
              </label>
              <!-- Agrega más exámenes según sea necesario -->
            </div>
          </div>
        </div>


        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary" style="margin-top: 1rem">Actualizar Consulta</button>
      </form>
    </div>
  </div>
</body>

</html>