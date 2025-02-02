<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nuevo Paciente</title>
    <link rel="stylesheet" href="<?= base_url('public/modulopacientecss/nuevopaciente.css'); ?>" />
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
    <!-- Main Content -->
    <div class="main-content">
        <div class="form-container">
            <h1 class="form-title">Editar Paciente</h1>
            <form action="<?= base_url('/actualizarpaciente'); ?>" method="POST" enctype="multipart/form-data">
                <div class="form-section">
                    <input type="hidden" name="pac_id" value="<?= $data['pac_id']; ?>" />
                    <h2 class="section-title">Datos Personales</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Apellidos</label>
                            <input type="text" class="form-input" name="apellidos" value="<?= $data['pac_apellidos']; ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nombres</label>
                            <input type="text" class="form-input" name="nombres" value="<?= $data['pac_nombres']; ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-input" name="fecha_nacimiento" value="<?= $data['pac_fechanacimiento']; ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Edad</label>
                            <input type="number" class="form-input" name="edad" value="<?= $data['pac_edad']; ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Género</label>
                            <select class="form-input" name="genero" required>
                                <option value="">Seleccionar</option>
                                <option value="1" <?= $data['pac_genero'] == 1 ? 'selected' : ''; ?>>Masculino</option>
                                <option value="2" <?= $data['pac_genero'] == 2 ? 'selected' : ''; ?>>Femenino</option>
                                <option value="3" <?= $data['pac_genero'] == 3 ? 'selected' : ''; ?>>Otro</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Cédula</label>
                            <input type="text" class="form-input" name="cedula" value="<?= $data['pac_cedula']; ?>" required />
                        </div>

                        <div class="form-group document-upload-group">
                            <label class="form-label">Documentos de Identificación</label>
                            <label class="form-label">Cargar Documento</label>
                            <input type="file" class="form-input" name="documentos" accept="image/pdf, image/png, image/jpeg" />
                        </div>

                        <div class="form-group">
                            <label class="form-label">Nivel de Instrucción</label>
                            <select class="form-input" name="nivel_instruccion" required>
                                <option value="">Seleccionar</option>
                                <option value="1" <?= $data['pac_nivelinstruccion'] == 1 ? 'selected' : ''; ?>>Primaria</option>
                                <option value="2" <?= $data['pac_nivelinstruccion'] == 2 ? 'selected' : ''; ?>>Secundaria</option>
                                <option value="3" <?= $data['pac_nivelinstruccion'] == 3 ? 'selected' : ''; ?>>Superior</option>
                                <option value="4" <?= $data['pac_nivelinstruccion'] == 4 ? 'selected' : ''; ?>>Postgrado</option>
                                <option value="5" <?= $data['pac_nivelinstruccion'] == 5 ? 'selected' : ''; ?>>Otro</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Ocupación</label>
                            <input type="text" class="form-input" name="ocupacion" value="<?= $data['pac_ocupacion']; ?>" />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Estado Civil</label>
                            <select class="form-input" name="estado_civil" required>
                                <option value="">Seleccionar</option>
                                <option value="1" <?= $data['pac_estadocivil'] == 1 ? 'selected' : ''; ?>>Soltero/a</option>
                                <option value="2" <?= $data['pac_estadocivil'] == 2 ? 'selected' : ''; ?>>Casado/a</option>
                                <option value="3" <?= $data['pac_estadocivil'] == 3 ? 'selected' : ''; ?>>Divorciado/a</option>
                                <option value="4" <?= $data['pac_estadocivil'] == 4 ? 'selected' : ''; ?>>Viudo/a</option>
                                <option value="5" <?= $data['pac_estadocivil'] == 5 ? 'selected' : ''; ?>>Unión Libre</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Teléfono</label>
                            <input type="tel" class="form-input" name="telefono" value="<?= $data['pac_telefono']; ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-input" name="email" value="<?= $data['pac_email']; ?>" required />
                        </div>
                        <div class="form-group full-width">
                            <label class="form-label">Dirección</label>
                            <textarea class="form-input" name="direccion" required><?= $data['pac_direccion']; ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2 class="section-title">Datos Médicos</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Peso Actual (kg)</label>
                            <input type="number" step="0.1" class="form-input" name="peso" value="<?= $data['pac_peso']; ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Talla (cm)</label>
                            <input type="number" step="0.1" class="form-input" name="talla" value="<?= $data['pac_talla']; ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Índice de Masa Corporal</label>
                            <input type="number" step="0.1" class="form-input" name="imc" value="<?= $data['pac_imc']; ?>" required />
                        </div>
                        <div class="form-group full-width">
                            <label class="form-label">Antecedentes Alérgicos</label>
                            <textarea class="form-input" name="antecedentes_alergicos"><?= $data['pac_antecedentesalergicos']; ?></textarea>
                        </div>
                        <div class="form-group full-width">
                            <label class="form-label">Cirugías Previas</label>
                            <textarea class="form-input" name="cirugias_previas"><?= $data['pac_cirugias']; ?></textarea>
                        </div>
                        <div class="form-group full-width">
                            <label class="form-label">Antecedentes Personales</label>
                            <textarea class="form-input" name="antecedentes_personales"><?= $data['pac_antecedentespersonales']; ?></textarea>
                        </div>
                        <div class="form-group full-width">
                            <label class="form-label">Antecedentes Familiares</label>
                            <textarea class="form-input" name="antecedentes_familiares"><?= $data['pac_antecedentesfamiliares']; ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2 class="section-title">Contacto de Emergencia</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Nombre Completo</label>
                            <input type="text" class="form-input" name="contacto_nombre" value="<?= $data['pac_nombreemergencia']; ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Relación</label>
                            <input type="text" class="form-input" name="contacto_relacion" value="<?= $data['pac_relacionemergencia']; ?>" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Teléfono</label>
                            <input type="tel" class="form-input" name="contacto_telefono" value="<?= $data['pac_telefonoemergencia']; ?>" required />
                        </div>
                    </div>
                </div>

                <div class="button-container">
                    <button type="submit" class="form-button">Actualizar Paciente</button>
                </div>
            </form>
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