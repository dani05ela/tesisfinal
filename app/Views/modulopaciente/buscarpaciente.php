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
    <!-- Modificación de la vista existente -->
    <div class="search-section">
      <div class="search-container">
        <div class="search-box">
          <i class="fas fa-search"></i>
          <input type="text" id="searchInput" placeholder="Buscar paciente..." />
        </div>
        <select class="search-select" id="searchBy">
          <option value="" disabled selected>Buscar por...</option>
          <option value="cedula">Cédula de identidad</option>
          <option value="nombres">Nombres</option>
          <option value="apellidos">Apellidos</option>
        </select>
      </div>
      <div class="search-button-container">
        <button class="search-button" id="searchButton">
          <i class="fas fa-search"></i>
          Buscar
        </button>
      </div>
    </div>

    <!-- Sección de resultados de búsqueda -->
    <div id="searchResults" class="search-results" style="display: none;">
      <h2>Resultados de la búsqueda</h2>
      <div class="patient-list" id="searchResultsList">
        <!-- Los resultados se insertarán aquí dinámicamente -->
      </div>
    </div>

    <!-- Frequent Patients -->
    <div class="frequent-patients">
      <h2>Pacientes Frecuentes</h2>
      <div class="patient-list">
        <?php foreach ($frequentPatients as $patient): ?>
          <div class="patient-item">
            <div class="patient-info">
              <div class="patient-avatar">
                <i class="fas fa-user"></i>
              </div>
              <div>
                <h4><?= esc($patient['nombres']) . ' ' . esc($patient['apellidos']) ?></h4>
                <p>HC: <?= esc($patient['numero_historia_clinica']) ?></p>
                <p>Última consulta: <?= date('d/m/Y', strtotime($patient['fecha_ultima_consulta'])) ?></p>
              </div>
            </div>
            <button class="view-history-btn"
              onclick="window.location.href='<?= base_url('historiaclinica/' . $patient['id']) ?>'">
              Ver Historia Clínica
            </button>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Add the JavaScript for handling search -->
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const searchButton = document.getElementById('searchButton');
        const searchInput = document.getElementById('searchInput');
        const searchBy = document.getElementById('searchBy');
        const searchResults = document.getElementById('searchResults');
        const searchResultsList = document.getElementById('searchResultsList');

        searchButton.addEventListener('click', function () {
          const searchTerm = searchInput.value;
          const searchCriteria = searchBy.value;

          if (!searchTerm || !searchCriteria) {
            alert('Por favor, ingrese un término de búsqueda y seleccione un criterio');
            return;
          }

          // Realizar la búsqueda mediante AJAX
          fetch(`<?= base_url('patient/search') ?>?searchTerm=${searchTerm}&searchBy=${searchCriteria}`)
            .then(response => response.json())
            .then(data => {
              searchResults.style.display = 'block';
              searchResultsList.innerHTML = '';

              data.patients.forEach(patient => {
                const patientElement = document.createElement('div');
                patientElement.className = 'patient-item';
                patientElement.innerHTML = `
                        <div class="patient-info">
                            <div class="patient-avatar">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h4>${patient.nombres} ${patient.apellidos}</h4>
                                <p>HC: ${patient.numero_historia_clinica}</p>
                                <p>Última consulta: ${new Date(patient.fecha_ultima_consulta).toLocaleDateString()}</p>
                            </div>
                        </div>
                        <button class="view-history-btn" onclick="window.location.href='<?= base_url('historiaclinica/') ?>${patient.id}'">
                            Ver Historia Clínica
                        </button>
                    `;
                searchResultsList.appendChild(patientElement);
              });
            })
            .catch(error => {
              console.error('Error:', error);
              alert('Ocurrió un error al realizar la búsqueda');
            });
        });
      });
    </script>

    <!-- Add Patient Button -->
    <a href="<?= base_url('/nuevopaciente'); ?>" class="add-patient-btn">
      <i class="fas fa-plus"></i>
      Añadir Nuevo Paciente
    </a>

  </div>
</body>

</html>