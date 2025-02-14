<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historia Clínica</title>
    <link rel="stylesheet" href="<?= base_url('public/modulohistoriasclinicascss/historiaclinica.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap" rel="stylesheet">
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
        <div class="summary-container">
            <!-- Información Administrativa -->
            <div class="form-section">
                <h2 class="section-title">Información Administrativa</h2>
                <div class="form-grid">
                    <div class="info-item">
                        <span class="info-label">Número de Historia Clínica</span>
                        <span class="info-value"><?= 'HC-' . esc($data['info_id']); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Fecha de Creación</span>
                        <span class="info-value"><?= esc($data['info_fechacreacion']); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Institución</span>
                        <span class="info-value"><?= esc($data['info_institucion']); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Nombre Médico Responsable</span>
                        <span class="info-value"><?= esc($data['info_medicoresponsable']); ?></span>
                    </div>
                </div>
            </div>

            <!-- Datos Personales -->
            <div class="form-section">
                <h2 class="section-title">Datos Personales</h2>
                <div class="form-grid">
                    <div class="info-item">
                        <span class="info-label">Apellidos</span>
                        <span class="info-value"><?= esc($data['pac_apellidos']); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Nombres</span>
                        <span class="info-value"><?= esc($data['pac_nombres']); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Fecha de Nacimiento</span>
                        <span class="info-value"><?= esc($data['pac_fechanacimiento']); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Edad</span>
                        <span class="info-value"><?= esc($data['pac_edad']); ?> años</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Género</span>

                        <span class="info-value">
                            <?php
                            switch ($data['pac_genero']) {
                                case 1:
                                    echo 'Masculino';
                                    break;
                                case 2:
                                    echo 'Femeninoa';
                                    break;
                                case 3:
                                    echo 'Otro';
                                    break;
                                default:
                                    echo 'Desconocido';
                                    break;
                            }
                            ?>
                        </span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Cédula</span>
                        <span class="info-value"><?= esc($data['pac_cedula']); ?></span>
                    </div>


                    <div class="info-item">
                        <span class="info-label">Cédula De Identidad</span>
                        <span class="info-value">
                            <a href="<?= base_url($data['pac_documentopdf']); ?>" target="_blank">
                                Ver PDF
                            </a>
                        </span>
                    </div>
<!--                     <div class="info-item">
                        <span class="info-label">Cédula De Identidad</span>
                        <span class="info-value">
                            <embed src="<?= base_url($data['pac_documentopdf']); ?>" type="application/pdf" width="100%"
                                height="500px">
                        </span>
                    </div> -->

                    <div class="info-item">
                        <span class="info-label">Nivel de Instrucción</span>

                        <span class="info-value">
                            <?php
                            switch ($data['pac_genero']) {
                                case 1:
                                    echo 'Primaria';
                                    break;
                                case 2:
                                    echo 'Secundaria';
                                    break;
                                case 3:
                                    echo 'Superior';
                                    break;
                                case 4:
                                    echo 'Postgrado';
                                    break;
                                case 5:
                                    echo 'Otro';
                                    break;
                                default:
                                    echo 'Desconocido';
                                    break;
                            }
                            ?>
                        </span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Ocupación</span>
                        <span class="info-value"><?= esc($data['pac_ocupacion']); ?></span>
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
                        <span class="info-label">Teléfono</span>
                        <span class="info-value"><?= esc($data['pac_telefono']); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Email</span>
                        <span class="info-value"><?= esc($data['pac_email']); ?></span>
                    </div>
                    <div class="info-item full-width">
                        <span class="info-label">Dirección</span>
                        <span class="info-value"><?= esc($data['pac_direccion']); ?></span>
                    </div>
                </div>
            </div>

            <!-- Datos Médicos -->
            <div class="form-section">
                <h2 class="section-title">Datos Médicos</h2>
                <div class="form-grid">
                    <div class="info-item">
                        <span class="info-label">Peso Actual (kg)</span>
                        <span class="info-value"><?= esc($data['pac_peso']); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Talla (cm)</span>
                        <span class="info-value"><?= esc($data['pac_talla']); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Índice de Masa Corporal</span>
                        <span class="info-value"><?= esc($data['pac_imc']); ?></span>
                    </div>
                    <div class="info-item full-width">
                        <span class="info-label">Antecedentes Alérgicos</span>
                        <span class="info-value"><?= esc($data['pac_antecedentesalergicos']); ?></span>
                    </div>
                    <div class="info-item full-width">
                        <span class="info-label">Cirugías Previas</span>
                        <span class="info-value"><?= esc($data['pac_cirugias']); ?></span>
                    </div>
                    <div class="info-item full-width">
                        <span class="info-label">Antecedentes Personales</span>
                        <span class="info-value"><?= esc($data['pac_antecedentespersonales']); ?></span>
                    </div>
                    <div class="info-item full-width">
                        <span class="info-label">Antecedentes Familiares</span>
                        <span class="info-value"><?= esc($data['pac_antecedentesfamiliares']); ?></span>
                    </div>
                </div>
            </div>

            <!-- Contacto de Emergencia -->
            <div class="form-section">
                <h2 class="section-title">Contacto de Emergencia</h2>
                <div class="form-grid">
                    <div class="info-item">
                        <span class="info-label">Nombre Completo</span>
                        <span class="info-value"><?= esc($data['pac_nombreemergencia']); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Relación</span>
                        <span class="info-value"><?= esc($data['pac_relacionemergencia']); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Teléfono</span>
                        <span class="info-value"><?= esc($data['pac_telefonoemergencia']); ?></span>
                    </div>
                </div>
            </div>



            <div class="consultation-history">
                <h2 class="section-title">Historial de Consultas</h2>
                <div class="consultation-list">
                    <?php if (!empty($consultas)): ?>
                        <?php foreach ($consultas as $consulta): ?>

                            <div class="consultation-item">
                                <span class="consultation-info">
                                    Consulta realizada en la fecha <?= esc($consulta['con_fechaconsulta']); ?>
                                </span>
                                <form action="<?= base_url('editarreceta'); ?>" method="post">
                                    <!-- Input oculto para enviar el ID de la consulta -->
                                    <input type="hidden" name="con_id" value="<?= esc($consulta['con_id']); ?>">
                                    <button type="submit" class="btn btn-secondary"
                                        style="width: auto; padding: 0.5rem 1rem;">Ver Receta</button>
                                </form>
                                <form action="<?= base_url('editarconsulta'); ?>" method="post">
                                    <!-- Input oculto para enviar el ID de la consulta -->
                                    <input type="hidden" name="con_id" value="<?= esc($consulta['con_id']); ?>">
                                    <button type="submit" class="btn btn-secondary"
                                        style="width: auto; padding: 0.5rem 1rem;">Ver Consulta</button>
                                </form>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p style="text-align: center; font-size: 1.2rem; color: #555;">
                            No hay consultas previas registradas.
                        </p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Botón Editar Historia Clínica -->

            <form action="<?= base_url('/editarpaciente'); ?>" method="post" style="display: inline;">
                <input type="hidden" name="pac_id" value="<?= esc($data['info_id']); ?>">
                <button class="btn btn-secondary" type="submit">Editar Historia Clínica</button>
            </form>

            <form action="<?= base_url('/nuevaconsulta'); ?>" method="post" style="display: inline;">
                <input type="hidden" name="pac_id" value="<?= esc($data['info_id']); ?>">
                <button class="btn btn-primary" type="submit">Nueva Consulta</button>
            </form>
        </div>
    </div>
</body>
<script>
    (function () {
        window.history.pushState(null, "", window.location.href);
        window.onpopstate = function () {
            window.history.pushState(null, "", window.location.href);
        };
    })();
</script>

</html>