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
    <div class="main-content">
        <div class="form-container">
            <h1 class="form-title">Registro de Nuevo Paciente</h1>
            <form action="<?= base_url('/guardarpaciente'); ?>" method="POST" enctype="multipart/form-data">
                <div class="form-section">
                    <h2 class="section-title">Información Administrativa</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Número de Historia Clínica</label>
                            <input type="text" class="form-input" name="hc_id" value="<?= $numeroHistoriaClinica ?>"
                                required readonly />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Fecha de Creación</label>
                            <input type="date" class="form-input" name="fecha_creacion" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Institución</label>
                            <input type="text" class="form-input" name="institucion" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nombre Médico Responsable</label>
                            <input type="text" class="form-input" name="medico_responsable" required />
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2 class="section-title">Datos Personales</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Apellidos</label>
                            <input type="text" class="form-input" name="apellidos" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nombres</label>
                            <input type="text" class="form-input" name="nombres" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-input" name="fecha_nacimiento" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Edad</label>
                            <input type="number" class="form-input" name="edad" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Género</label>
                            <select class="form-input" name="genero" required>
                                <option value="">Seleccionar</option>
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                                <option value="3">Otro</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Cédula</label>
                            <input type="text" class="form-input" name="cedula" required />
                        </div>

                        <div class="form-group document-upload-group">
                            <label class="form-label">Documentos de Identificación</label>
                            <button type="button" class="document-upload-button">
                                <i class="fas fa-upload"></i> Cargar Documentos
                            </button>
                            <input type="file" id="document-upload" class="document-upload-input" name="documentos"
                                multiple accept=".pdf,.jpg,.png" />
                        </div>

                        <div class="form-group">
                            <label class="form-label">Nivel de Instrucción</label>
                            <select class="form-input" name="nivel_instruccion" required>
                                <option value="">Seleccionar</option>
                                <option value="1">Primaria</option>
                                <option value="2">Secundaria</option>
                                <option value="3">Superior</option>
                                <option value="4">Postgrado</option>
                                <option value="5">Otro</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Ocupación</label>
                            <input type="text" class="form-input" name="ocupacion" />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Estado Civil</label>
                            <select class="form-input" name="estado_civil" required>
                                <option value="">Seleccionar</option>
                                <option value="1">Soltero/a</option>
                                <option value="2">Casado/a</option>
                                <option value="3">Divorciado/a</option>
                                <option value="4">Viudo/a</option>
                                <option value="5">Unión Libre</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Teléfono</label>
                            <input type="tel" class="form-input" name="telefono" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-input" name="email" required />
                        </div>
                        <div class="form-group full-width">
                            <label class="form-label">Dirección</label>
                            <textarea class="form-input" name="direccion" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2 class="section-title">Datos Médicos</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Peso Actual (kg)</label>
                            <input type="number" step="0.1" class="form-input" name="peso" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Talla (cm)</label>
                            <input type="number" step="0.1" class="form-input" name="talla" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Índice de Masa Corporal</label>
                            <input type="number" step="0.1" class="form-input" name="imc" required />
                        </div>
                        <div class="form-group full-width">
                            <label class="form-label">Antecedentes Alérgicos</label>
                            <textarea class="form-input" name="antecedentes_alergicos"></textarea>
                        </div>
                        <div class="form-group full-width">
                            <label class="form-label">Cirugías Previas</label>
                            <textarea class="form-input" name="cirugias_previas"></textarea>
                        </div>
                        <div class="form-group full-width">
                            <label class="form-label">Antecedentes Personales</label>
                            <textarea class="form-input" name="antecedentes_personales"></textarea>
                        </div>
                        <div class="form-group full-width">
                            <label class="form-label">Antecedentes Familiares</label>
                            <textarea class="form-input" name="antecedentes_familiares"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2 class="section-title">Contacto de Emergencia</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Nombre Completo</label>
                            <input type="text" class="form-input" name="contacto_nombre" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Relación</label>
                            <input type="text" class="form-input" name="contacto_relacion" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Teléfono</label>
                            <input type="tel" class="form-input" name="contacto_telefono" required />
                        </div>
                    </div>
                </div>

                <div class="button-container">
                    <button type="submit" class="form-button">Guardar Paciente</button>
                </div>
            </form>

        </div>
    </div>
    <script>
        // Optional JavaScript to handle file upload interaction
        document.addEventListener("DOMContentLoaded", () => {
            const uploadButton = document.querySelector(".document-upload-button");
            const fileInput = document.getElementById("document-upload");

            uploadButton.addEventListener("click", () => {
                fileInput.click();
            });

            fileInput.addEventListener("change", (event) => {
                const files = event.target.files;
                if (files.length > 0) {
                    uploadButton.innerHTML = `<i class="fas fa-check"></i> ${files.length} archivo(s) seleccionado(s)`;
                }
            });
        });
    </script>
</body>

</html>