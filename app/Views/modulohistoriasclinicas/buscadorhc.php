<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Buscador de Historias Clínicas</title>
  <link rel="stylesheet" href="<?= base_url('public/modulohistoriasclinicascss/buscadorhc.css'); ?>" />
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
      <a href="<?= base_url('/inicio'); ?>" class="nav-link">
        <i class="fas fa-sign-out-alt"></i>
        <span>Salir</span>
      </a>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="main-content">
    <div class="form-container">
      <h1 class="form-title">Buscador de Historias Clínicas</h1>

      <!-- Simplified Search Form -->
      <form id="search-form" method="post" action="<?= base_url('/filtrarhistoriasclinicas'); ?>">
        <div class="form-grid">
          <div class="form-group full-width">
            <label class="form-label">Buscar por</label>
            <select class="form-input" id="buscar-por" name="criterio">
              <option value="nombres">Nombres</option>
              <option value="apellidos">Apellidos</option>
              <option value="cedula">Cédula</option>
            </select>
          </div>
          <div class="form-group full-width">
            <label class="form-label">Término de Búsqueda</label>
            <input type="text" class="form-input" id="termino-busqueda" name="valorBusqueda" />
          </div>
        </div>

        <div class="button-container">
          <button type="submit" class="form-button">
            <i class="fas fa-search"></i> Buscar Historias
          </button>
          <button type="reset" class="form-button form-button-secondary">
            <i class="fas fa-redo"></i> Limpiar Filtros
          </button>
        </div>
      </form>


      <!-- Search Results Table -->
      <div class="results-section" style="margin-top: 2rem">
        <h2 class="section-title">Resultados de la Búsqueda</h2>
        <table class="results-table">
          <thead>
            <tr>
              <th>N° Historia</th>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Cédula</th>
              <th>Última Consulta</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="resultados-busqueda">
            <?php if (!empty($resultados)): ?>
              <?php foreach ($resultados as $resultado): ?>
                <tr>
                  <td><?= esc($resultado['info_id']); ?></td>
                  <td><?= esc($resultado['pac_nombres']); ?></td>
                  <td><?= esc($resultado['pac_apellidos']); ?></td>
                  <td><?= esc($resultado['pac_cedula']); ?></td>
                  <td><?= esc($resultado['con_fechaconsulta'] ?? 'No registrada'); ?></td>
                  <td>

                    <form action="<?= base_url('/resumenpaciente'); ?>" method="post">
                      <input type="hidden" name="pac_id" value="<?= esc($resultado['pac_id']); ?>" />
                      <button type="submit" class="form-button">
                        <i class="fas fa-search"></i>
                      </button>
                    </form>

                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="6" style="text-align: center;">No se encontraron resultados</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>


    </div>
  </div>
  </script>
</body>

</html>