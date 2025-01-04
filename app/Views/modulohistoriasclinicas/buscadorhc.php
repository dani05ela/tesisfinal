<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buscador de Historias Clínicas</title>
    <link rel="stylesheet" href="<?= base_url ('public/modulohistoriasclinicascss/buscadorhc.css');?>">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap"
      rel="stylesheet" />
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
        <form id="search-form">
          <div class="form-grid">
            <div class="form-group full-width">
              <label class="form-label">Buscar por</label>
              <select class="form-input" id="buscar-por">
                <option value="nombres">Nombres</option>
                <option value="apellidos">Apellidos</option>
                <option value="cedula">Cédula</option>
              </select>
            </div>
            <div class="form-group full-width">
              <label class="form-label">Término de Búsqueda</label>
              <input type="text" class="form-input" id="termino-busqueda" />
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
              <!-- Tabla de resultados se llenará dinámicamente -->
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script>
      // Simulated search functionality (would be replaced by actual backend search)
      document
        .getElementById("search-form")
        .addEventListener("submit", function (e) {
          e.preventDefault();

          // Simulated search results
          const resultados = [
            {
              historia: "001-2024",
              nombres: "María",
              apellidos: "González Pérez",
              cedula: "1725487596",
              ultimaConsulta: "2024-03-15",
            },
            {
              historia: "002-2024",
              nombres: "Juan",
              apellidos: "Rodríguez Martínez",
              cedula: "1807542369",
              ultimaConsulta: "2024-02-22",
            },
          ];

          const tablaResultados = document.getElementById(
            "resultados-busqueda"
          );
          tablaResultados.innerHTML = ""; // Clear previous results

          resultados.forEach((resultado) => {
            const fila = `
                    <tr>
                        <td>${resultado.historia}</td>
                        <td>${resultado.nombres}</td>
                        <td>${resultado.apellidos}</td>
                        <td>${resultado.cedula}</td>
                        <td>${resultado.ultimaConsulta}</td>
                        <td>
                            <button class="action-button">Ver Detalle</button>
                        </td>
                    </tr>
                `;
            tablaResultados.innerHTML += fila;
          });
        });
    </script>
  </body>
</html>